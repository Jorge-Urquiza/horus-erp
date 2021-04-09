<?php

namespace App\Http\Controllers;

use App\DataTables\BrandsTable;
use App\Models\Marca;
use App\Repositories\Marca\MarcaRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepository)
    {
        $this->marcaRepository = $marcaRepository;
    }

    public function index()
    {
        $brands = $this->marcaRepository->getAll();

        return view('brands.index',compact('brands'));
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
    public function store(Request $request)
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
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('brands.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {

       $this->marcaRepository->update ($marca, $request->post());

        flash()->updated();

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca = $this->marcaRepository->delete($marca);

        flash()->deleted();

        return redirect()->route('brands.index');
    }

    public function list()
    {
        return BrandsTable::generate();
    }

}
