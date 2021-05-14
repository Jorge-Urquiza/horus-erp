<?php

namespace App\Http\Controllers;

use App\DataTables\OutputNoteCanceledTable;
use App\DataTables\OutputNoteDeliveredTable;
use App\DataTables\OutputNoteProcessedTable;
use App\Http\Requests\outputs\StoreOutputRequest;
use App\Models\BranchOffice;
use App\Models\BranchsProduct;
use App\Models\OutputDetail;
use App\Models\OutputNote;
use App\Models\Product;
use App\ViewModels\OutputNote\OutputViewModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OutputNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:outputs.create')->only(['create']);
        $this->middleware('permission:outputs.index')->only(['index','show']);
        $this->middleware('permission:outputs.destroy')->only(['destroy']);
        $this->middleware('permission:outputs.pdf')->only(['pdf','download']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outputs.index');
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
        return view('outputs.create',compact('branch_office', 'fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutputRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $output = OutputNote::registrar($request);

            $sucursal = $request->input('branch_office_id');
            $productos = $request->input('producto_id');
            $cantidad = $request->input('cantidad');
            $costo = $request->input('costo');
            
            for( $i=0; $i < count($productos) ;$i++){
                
                OutputDetail::create([
                    'product_id' => $productos[$i],
                    'quantity' => $cantidad[$i],
                    'cost' => $costo[$i],
                    'output_note_id' => $output->id,
                ]);
            }
            DB::commit();
            flash()->stored();
            return redirect()->route('outputs.index');

        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }

    public function delivered_store(OutputNote $output)
    {
        try {
            DB::beginTransaction();
            
            $detalles = OutputDetail::where('output_note_id', $output->id)->get();
            foreach($detalles as $d){
            
                $branch_product = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$output->branch_office_id]])
                                   ->first();
                if(($d->quantity * 1 ) > $branch_product->current_stock){
                    DB::rollBack();
                    flash()->error('El stock es menor a la cantidad del producto a salir');
                    return redirect()->back();
                }

                $branch_product->current_stock = $branch_product->current_stock - ($d->quantity * 1);
                $branch_product->update();
               
                $product = Product::find($d->product_id);
                $product->total_current_stock = $product->total_current_stock - ( $d->quantity * 1);
                $product->update();

            }
            $output->status = 'Entregado';
            $output->update();
            DB::commit();
            flash()->stored('Salida de Productos Exitosa');
            return redirect()->route('outputs.index');

        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function show(OutputNote $output)
    {
        return view('outputs.show', compact('output'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function edit(OutputNote $outputNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutputNote $outputNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutputNote $output)
    {
        try {
                DB::beginTransaction();
                /*$detalles = OutputDetail::where('output_note_id', $output->id)->get();
                foreach($detalles as $d){
                    $branch_product = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$output->branch_office_id]])
                                        ->first();
                    $branch_product->current_stock = $branch_product->current_stock + ($d->quantity * 1);
                    $branch_product->update();

                    Product::incrementarStock($d->product_id, $d->quantity);
                }
                OutputDetail::remove($output->id);*/
                $output->status = 'Anulado';
                $output->update();
                flash()->deleted('Nota de Salida Anulada exitosamente');
                DB::commit();
                return redirect()->route('outputs.index');
        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
        
    }

    public function canceled_list()
    {
        return OutputNoteCanceledTable::generate();
    }
    public function processed_list()
    {
        return OutputNoteProcessedTable::generate();
    }
    public function delivered_list()
    {
        return OutputNoteDeliveredTable::generate();
    }

    public function pdf(OutputNote $output)
    {
        return PDF::loadView('outputs.pdf', new OutputViewModel($output))->stream('salida - ' . $output->id . '.pdf');
    }

    public function download(OutputNote $output)
    {
        return PDF::loadView('outputs.pdf', new OutputViewModel($output))->download('salida - ' . $output->id . '.pdf');
    }
}
