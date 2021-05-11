<?php

namespace App\Http\Controllers;

use App\DataTables\BranchsProductTable;
use App\Http\Requests\branchproducts\StoreBranchsProductsRequest;
use App\Models\BranchsProduct;
use Illuminate\Http\Request;

class BranchProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:branch-products.index')->only(['index']);
        $this->middleware('permission:branch-products.edit')->only(['update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('branch_products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBranchsProductsRequest $request, BranchsProduct $branch_product)
    {
        
        $branch_product->fill($request->all());

        $branch_product->save();

        flash()->updated();

        return redirect()->route('branch-products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        return BranchsProductTable::generate();
    }
}
