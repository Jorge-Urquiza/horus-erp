<?php

namespace App\Http\Controllers;

use App\Models\IncomeNote;
use Illuminate\Http\Request;
use App\DataTables\IncomeNoteTable;
use App\Http\Requests\incomes\StoreIncomeRequest;
use App\Models\BranchOffice;
use App\Models\BranchsProduct;
use App\Models\IncomeDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeNoteController extends Controller
{
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
            
            $mytime = Carbon::now('America/La_paz');
            $fecha = $mytime->toDateString();
            $user = Auth::user();
            $request->request->add(['date' => $fecha]);
            $request->request->add(['user_id' => $user->id]);
            
            $income = IncomeNote::create($request->post());
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
                    
                    BranchsProduct::create([
                        'product_id' => $productos[$i],
                        'branch_office_id' => $sucursal,
                        'current_stock' => $cantidad[$i],
                    ]);
                }

                $stock_product = Product::find($productos[$i]);
                $stock_product->current_stock = $stock_product->current_stock + ($cantidad[$i] * 1);
                $stock_product->update();

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
        
        $detalle = IncomeDetail::where('income_note_id','=', $income->id)->get();
        return view('incomes.show', compact('income', 'detalle'));
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
    public function destroy(IncomeNote $incomeNote)
    {
        //
    }

    public function list()
    {
        return IncomeNoteTable::generate();
    }
}
