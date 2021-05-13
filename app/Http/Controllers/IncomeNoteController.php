<?php

namespace App\Http\Controllers;

use App\DataTables\IncomeNoteCanceledTable;
use App\DataTables\IncomeNoteEnteredTable;
use App\DataTables\IncomeNoteProcessedTable;
use App\Models\IncomeNote;
use Illuminate\Http\Request;
use App\Http\Requests\incomes\StoreIncomeRequest;
use App\Models\BranchOffice;
use App\Models\BranchsProduct;
use App\Models\IncomeDetail;
use App\Models\Product;
use App\ViewModels\IncomeNote\IncomeViewModel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncomeNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:incomes.create')->only(['create']);
        $this->middleware('permission:incomes.index')->only(['index','show']);
        $this->middleware('permission:incomes.destroy')->only(['destroy']);
        $this->middleware('permission:incomes.pdf')->only(['pdf','download']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incomes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = Carbon::now('America/La_paz');
        $fecha = $mytime->toDateString();
        $branch_office = BranchOffice::get();
        $products = Product::orderBy('id', 'DESC')->pluck('name','id');
        return view('incomes.create',compact('branch_office', 'fecha','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        try {
            DB::beginTransaction();
            $income = IncomeNote::registrar($request);

            $sucursal = $request->input('branch_office_id');
            $productos = $request->input('producto_id');
            $cantidad = $request->input('cantidad');
            
            for( $i=0; $i < count($productos) ;$i++){
                
                IncomeDetail::create([
                    'product_id' => $productos[$i],
                    'quantity' => $cantidad[$i],
                    'income_note_id' => $income->id,
                ]);

                $branch_product = BranchsProduct::where([['product_id', $productos[$i]],['branch_office_id',$sucursal]])
                                   ->first();
               
                if(!is_null($branch_product)){
                   
                    $branch_product->current_stock = $branch_product->current_stock + ($cantidad[$i] * 1);
                    $branch_product->update();
                } else {
                    $product = Product::find($productos[$i]);
                    BranchsProduct::create([
                        'product_id' => $productos[$i],
                        'branch_office_id' => $sucursal,
                        'current_stock' => $cantidad[$i],
                        'minimum_stock' => $product->minimum_stock,
                        'maximum_stock' => $product->maximum_stock,
                    ]);
                }
                Product::incrementarStock($productos[$i], $cantidad[$i]);

            }
            DB::commit();
            flash()->stored();
            return redirect()->route('incomes.index');

        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeNote $income)
    {
        return view('incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeNote $incomeNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeNote $incomeNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeNote $income)
    {
        try {
            DB::beginTransaction();
            $detalles = IncomeDetail::where('income_note_id', $income->id)->get();
            foreach($detalles as $d){

                $branch_product = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$income->branch_office_id]])
                                        ->first();
                if(($d->quantity * 1 ) > $branch_product->current_stock)                        
                {
                    DB::rollBack();
                    flash()->error('El stock es menor a la cantidad a anular');
                    return redirect()->back();
                      
                }
                $branch_product->current_stock = $branch_product->current_stock - ($d->quantity * 1);
                $branch_product->update();

                Product::decrementarStock($d->product_id, $d->quantity);
                
            }

            IncomeDetail::remove($income->id);
            $income->delete();
            flash()->deleted();
            DB::commit();
            return redirect()->route('incomes.index');
        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }

    public function canceled_list()
    {
        return IncomeNoteCanceledTable::generate();
    }
    public function processed_list()
    {
        return IncomeNoteProcessedTable::generate();
    }
    public function entered_list()
    {
        return IncomeNoteEnteredTable::generate();
    }

    public function pdf(IncomeNote $income)
    {
        return PDF::loadView('incomes.pdf', new IncomeViewModel($income))->stream('ingreso - ' . $income->id . '.pdf');
    }

    public function download(IncomeNote $income)
    {
        return PDF::loadView('incomes.pdf', new IncomeViewModel($income))->download('ingreso - ' . $income->id . '.pdf');
    }
}
