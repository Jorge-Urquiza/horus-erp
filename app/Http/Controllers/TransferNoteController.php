<?php

namespace App\Http\Controllers;

use App\DataTables\TransferNoteCanceledTable;
use App\DataTables\TransferNoteFinalizedTable;
use App\DataTables\TransferNoteProcessedTable;
use App\Http\Requests\transfers\StoreTransferRequest;
use App\Models\BranchOffice;
use App\Models\BranchsProduct;
use App\Models\Product;
use App\Models\TransferDetail;
use App\Models\TransferNote;
use App\ViewModels\TransferNote\TransferViewModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransferNoteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('permission:transfers.entregar')->only(['finalized_store']);
        $this->middleware('permission:transfers.create')->only(['create']);
        $this->middleware('permission:transfers.index')->only(['index','show']);
        $this->middleware('permission:transfers.destroy')->only(['destroy']);
        $this->middleware('permission:transfers.pdf')->only(['pdf','download']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transfers.index');
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
        return view('transfers.create',compact('branch_office', 'fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransferRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $transfer = TransferNote::registrar($request);
            
            $sucursal_origen = $request->input('branch_office_origin_id');
            $sucursal_destino = $request->input('branch_office_destiny_id');
            $productos = $request->input('producto_id');
            $cantidad = $request->input('cantidad');
            $costo_entrada = $request->input('costo_entrada');
            $costo_salida = $request->input('costo_salida');
            
            for( $i=0; $i < count($productos) ;$i++){
                
                TransferDetail::create([
                    'product_id' => $productos[$i],
                    'quantity' => $cantidad[$i],
                    'income_cost' => $costo_entrada[$i],
                    'output_cost' => $costo_salida[$i],
                    'transfer_note_id' => $transfer->id,
                ]);
                
            }
            DB::commit();
            flash()->stored();
            return redirect()->route('transfers.index');

        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }


    public function finalized_store(TransferNote $transfer)
    {
        try {
            DB::beginTransaction();
            $mensaje_advertencia='';
            $detalles = TransferDetail::where('transfer_note_id', $transfer->id)->get();
            foreach($detalles as $d){
                // SALIDA DE PRODUCTO
                
                $branch_product = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$transfer->branch_office_origin_id]])
                                    ->first();

                if(($d->quantity * 1) > $branch_product->current_stock)
                {
                    DB::rollBack();
                    flash()->error('No hay Stock Suficiente');
                    return redirect()->back();
                }

                $branch_product->current_stock = $branch_product->current_stock - ($d->quantity * 1);
                $branch_product->update();

                // ENTRADA DE PRODUCTO
                
                $branch_product_destino = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$transfer->branch_office_destiny_id]])
                                    ->first();

                if(!is_null($branch_product_destino)){
                    $branch_product_destino->current_stock = $branch_product_destino->current_stock + ($d->quantity * 1);
                    $branch_product_destino->update();
                    
                } else {

                    BranchsProduct::create([
                        'product_id' => $d->product_id,
                        'branch_office_id' => $transfer->branch_office_destiny_id,
                        'current_stock' => $d->quantity,
                    ]);
                    $mensaje_advertencia = "Actualizar los stock minimos y maximos de productos en Sucursal Producto, si se requiere";
                    $product = Product::find($d->product_id);
                    $product->total_minimum_stock = ( $product->total_minimum_stock + 10 * 1);
                    $product->total_maximum_stock = ( $product->total_maximum_stock + 100 *1);
                    $product->update();
                }
                
            }
            
            $transfer->status = 'Finalizado';
            $transfer->update();
            DB::commit();
            flash()->stored("Productos Traspados Exitosamente");
            return redirect()->route('transfers.index')->with('advertencia', $mensaje_advertencia);

        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferNote  $transferNote
     * @return \Illuminate\Http\Response
     */
    public function show(TransferNote $transfer)
    {
        return view('transfers.show', compact('transfer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferNote  $transferNote
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferNote $transferNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferNote  $transferNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferNote $transferNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferNote  $transferNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferNote $transfer)
    {
        try {
            DB::beginTransaction();
            
            $transfer->status = 'Anulado';
            $transfer->update();
            flash()->deleted('Nota de Traspaso anulada Exitosamente');
            DB::commit();
            return redirect()->route('transfers.index');
        } catch (\Exception $th) {
            DB::rollBack();
            flash()->error();
            return redirect()->back();
        }
    }

    public function processed_list()
    {
        return TransferNoteProcessedTable::generate();
    }

    public function finalized_list()
    {
        return TransferNoteFinalizedTable::generate();
    }

    public function canceled_list()
    {
        return TransferNoteCanceledTable::generate();
    }

    public function pdf(TransferNote $transfer)
    {
        return PDF::loadView('transfers.pdf', new TransferViewModel($transfer))->stream('traspaso - ' . $transfer->id . '.pdf');
    }

    public function download(TransferNote $transfer)
    {
        return PDF::loadView('transfers.pdf', new TransferViewModel($transfer))->download('traspaso - ' . $transfer->id . '.pdf');
    }
}
