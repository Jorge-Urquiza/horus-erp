<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Actions\StoreSaleAction;
use App\DataTables\SalesTable;
use App\Enums\Message;
use App\Http\Requests\sales\StoreSaleRequest;
use App\ViewModels\Sale\SaleCreateViewModel;
use App\ViewModels\Sale\SaleViewModel;
use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function create()
    {
        return view('sales.create', new SaleCreateViewModel);
    }

    public function store(StoreSaleRequest $request)
    {
        $action = new StoreSaleAction($request->validated());

        $action->execute();

        flash()->stored();

        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', new SaleViewModel($sale));
    }

    public function destroy(Sale $sale)
    {
      $sale->delete();

      flash()->deleted();

      return view('sales.index');
    }

    public function list()
    {
        return SalesTable::generate();
    }

    public function pdf(Sale $sale)
    {
        $pdf = PDF::loadView('sales.pdf', new SaleViewModel($sale));

        return $pdf->stream('venta' . $sale->id . '.pdf');
    }

    public function download(Sale $sale)
    {
        $pdf = PDF::loadView('sales.pdf', new SaleViewModel($sale));

        return $pdf->download('venta' . $sale->id . '.pdf');
    }
}
