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
        $this->middleware('permission:brands.create')->only(['create']);
        $this->middleware('permission:brands.index')->only(['index','show']);
        $this->middleware('permission:brands.destroy')->only(['destroy']);
        $this->middleware('permission:brands.edit')->only(['edit']);
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
    public function show(Brand $brand)
    {
        return response()->json($brand);
    }


    public function edit(Brand $marca)
    {
        return view('brands.edit', compact('categoria'));
    }

    public function update(Request $request, Brand $brand)
    {
        
        $brand->fill($request->post());

        $brand->save();

        flash()->updated();

        return redirect()->route('brands.index'); 
    }

    public function destroy(Brand $brand)
    {
        
        $this->marcaRepository->delete($brand);

        flash()->deleted();

        return redirect()->route('brands.index');
    }

    public function list()
    {
        return BrandsTable::generate();
    }

}
