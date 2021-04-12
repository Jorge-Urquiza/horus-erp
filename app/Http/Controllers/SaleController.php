<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $products =Product::orderBy('name')->pluck('name','id');
        $customers =Customer::orderBy('name')->pluck('name','id');

        return view('sales.create', compact('products','customers'));
    }
    public function store(Request $request)
    {
        //
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
