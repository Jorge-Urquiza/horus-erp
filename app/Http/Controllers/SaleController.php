<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Actions\StoreSaleAction;
use App\DataTables\SalesTable;
use App\Http\Requests\sales\StoreSaleRequest;
use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function create()
    {
        $products = Product::orderBy('id', 'DESC')->pluck('name','id');

        $user = auth()->user();

        return view('sales.create', compact('products','user'));
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
        dd($sale);
        return view('sales.show', compact('sale'));
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
        return PDF::loadView('sales.pdf', $sale)->stream('venta - ' . $sale->id . '.pdf');
    }

    public function download(Sale $sale)
    {
        return PDF::loadView('sales.pdf', $sale)->download('venta - ' . $sale->id . '.pdf');
    }
}
