<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsTable;
use App\Http\Requests\products\EditProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\MeasurementsUnits;
use App\Models\Brand;
use App\Http\Requests\products\StoreProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:productos.create')->only(['create']);
        $this->middleware('permission:productos.index')->only(['index','show']);
        $this->middleware('permission:productos.destroy')->only(['destroy']);
        $this->middleware('permission:productos.edit')->only(['edit']);
    }

    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $units = MeasurementsUnits::all();
        $suppliers = Supplier::all();
        return view('products.create', compact('categories','brands','units','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        if($request->hasFile('imagen'))
        {

            $filename= time().'_'.$request->imagen->getClientOriginalName();  
            $request->imagen->storeAs('public/upload',$filename);
            $request->request->add(['image' => $filename]);
        }
        Product::create($request->all());
        flash()->stored();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $units = MeasurementsUnits::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('categories','brands','units','suppliers','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $product)
    {
        
        if($request->hasFile('imagen'))
          {

           $filename= time().'_'.$request->imagen->getClientOriginalName(); 
           $request->imagen->storeAs('public/upload',$filename);
           $request->request->add(['image' => $filename]);
          }

        $product->fill($request->all());

        $product->update();

        flash()->updated();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        flash()->deleted();

        return redirect()->route('products.index');
    }

    public function list()
    {
        return ProductsTable::generate();
    }
}
