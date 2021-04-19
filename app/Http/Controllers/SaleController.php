<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
