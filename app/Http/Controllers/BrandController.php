<?php

namespace App\Http\Controllers;

use App\DataTables\BrandsTable;
use App\Models\Brand;
use App\Repositories\Marca\MarcaRepository;
use Illuminate\Http\Request;
use App\Http\Requests\brands\StoreBrandRequest;

class BrandController extends Controller
{
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepository)
    {
        $this->marcaRepository = $marcaRepository;
    }

    public function index()
    {
        return view('brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
       $this->marcaRepository->create ($request->post());

        flash()->stored();

        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $marca)
    {
        //
    }


    public function edit(Brand $marca)
    {
        return view('brands.edit', compact('categoria'));
    }

<<<<<<< HEAD
    public function update(Request $request, Brand $brand)
    {
        $brand->fill($request->post());

        $brand->save();
=======
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandRequest $request,Brand $brand)
    {
        //$marca = Brand::find($id);
       $this->marcaRepository->update ($brand, $request->post());
>>>>>>> 03b0b3645c90a15d81637cfdac8d0ff308fb8358

        flash()->updated();

        return redirect()->route('brands.index');
    }

    public function destroy($id)
    {
        $marca = Brand::find($id);

        $marca = $this->marcaRepository->delete($marca);

        flash()->deleted();

        return redirect()->route('brands.index');
    }

    public function list()
    {
        return BrandsTable::generate();
    }

}
