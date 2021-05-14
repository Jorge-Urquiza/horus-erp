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
            
            for( $i=0; $i < count($productos) ;$i++){
                
                TransferDetail::create([
                    'product_id' => $productos[$i],
                    'quantity' => $cantidad[$i],
                    'transfer_note_id' => $transfer->id,
                ]);
                // SALIDA DE PRODUCTO
                
                $branch_product = BranchsProduct::where([['product_id', $productos[$i]],['branch_office_id',$sucursal_origen]])
                                   ->first();
               
                $branch_product->current_stock = $branch_product->current_stock - ($cantidad[$i] * 1);
                $branch_product->update();
               
                Product::decrementarStock($productos[$i],$cantidad[$i]);
                
                // ENTRADA DE PRODUCTO
                $branch_product = BranchsProduct::where([['product_id', $productos[$i]],['branch_office_id',$sucursal_destino]])
                                   ->first();
               
                if(!is_null($branch_product)){
                   
                    $branch_product->current_stock = $branch_product->current_stock + ($cantidad[$i] * 1);
                    $branch_product->update();
                } else {
                    $product = Product::find($productos[$i]);
                    BranchsProduct::create([
                        'product_id' => $productos[$i],
                        'branch_office_id' => $sucursal_destino,
                        'current_stock' => $cantidad[$i],
                        'minimum_stock' => $product->minimum_stock,
                        'maximum_stock' => $product->maximum_stock,
                    ]);
                }
                Product::incrementarStock($productos[$i], $cantidad[$i]);



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
            
            /*$transfer = TransferNote::registrar($request);
            
            $sucursal_origen = $request->input('branch_office_origin_id');
            $sucursal_destino = $request->input('branch_office_destiny_id');
            $productos = $request->input('producto_id');
            $cantidad = $request->input('cantidad');
            
            for( $i=0; $i < count($productos) ;$i++){
                
                TransferDetail::create([
                    'product_id' => $productos[$i],
                    'quantity' => $cantidad[$i],
                    'transfer_note_id' => $transfer->id,
                ]);
                // SALIDA DE PRODUCTO
                
                $branch_product = BranchsProduct::where([['product_id', $productos[$i]],['branch_office_id',$sucursal_origen]])
                                   ->first();
               
                $branch_product->current_stock = $branch_product->current_stock - ($cantidad[$i] * 1);
                $branch_product->update();
               
                Product::decrementarStock($productos[$i],$cantidad[$i]);
                
                // ENTRADA DE PRODUCTO
                $branch_product = BranchsProduct::where([['product_id', $productos[$i]],['branch_office_id',$sucursal_destino]])
                                   ->first();
               
                if(!is_null($branch_product)){
                   
                    $branch_product->current_stock = $branch_product->current_stock + ($cantidad[$i] * 1);
                    $branch_product->update();
                } else {
                    $product = Product::find($productos[$i]);
                    BranchsProduct::create([
                        'product_id' => $productos[$i],
                        'branch_office_id' => $sucursal_destino,
                        'current_stock' => $cantidad[$i],
                        'minimum_stock' => $product->minimum_stock,
                        'maximum_stock' => $product->maximum_stock,
                    ]);
                }
                Product::incrementarStock($productos[$i], $cantidad[$i]);



            }*/
            DB::commit();
            flash()->stored();
            return redirect()->route('transfers.index');

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
            $detalles = TransferDetail::where('transfer_note_id', $transfer->id)->get();
            foreach($detalles as $d){
                // RE ENINGRESO DEL PRODUCTO
                $branch_product = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$transfer->branch_office_origin_id]])
                                    ->first();
                $branch_product->current_stock = $branch_product->current_stock + ($d->quantity * 1);
                $branch_product->update();
                Product::incrementarStock($d->product_id, $d->quantity);
                //DEVOLUCION DEL PRODUCTO DEL ALMACEN DESTINO
                $branch_product = BranchsProduct::where([['product_id', $d->product_id],['branch_office_id',$transfer->branch_office_destiny_id]])
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
            TransferDetail::remove($transfer->id);
            $transfer->is_canceled = true;
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
