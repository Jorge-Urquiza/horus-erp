<?php

namespace App\Http\Controllers;

use App\Actions\StoreSaleAction;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        dd(Sale::all());
        return view('sales.index');
    }


    public function create()
    {
        $products = Product::orderBy('id', 'DESC')->pluck('name','id');

        $user = auth()->user();

        return view('sales.create', compact('products','user'));
    }
    public function store(Request $request)
    {
        $action = new StoreSaleAction($request->post());

        $action->execute();

        return redirect()->route('sales.index');
    }


    public function show(Sale $sale)
    {
        //
    }


    public function edit(Sale $sale)
    {
        //
    }


    public function update(Request $request, Sale $sale)
    {
        //
    }


    public function destroy(Sale $sale)
    {
        //
    }
}
