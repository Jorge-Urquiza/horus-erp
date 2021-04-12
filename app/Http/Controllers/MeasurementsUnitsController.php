<?php

namespace App\Http\Controllers;

use App\Models\MeasurementsUnits;
use Illuminate\Http\Request;
use App\DataTables\UnitsTable;
use App\Http\Requests\units\StoreUnitRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class MeasurementsUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('units.index');
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
    public function store(StoreUnitRequest $request)
    {
        $result = MeasurementsUnits::create($request->post());
            
        flash()->stored();

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeasurementsUnits  $measurementsUnits
     * @return \Illuminate\Http\Response
     */
    public function show(MeasurementsUnits $measurementsUnits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeasurementsUnits  $measurementsUnits
     * @return \Illuminate\Http\Response
     */
    public function edit(MeasurementsUnits $measurementsUnits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeasurementsUnits  $measurementsUnits
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUnitRequest $request, $id)
    {
        $measurementsUnits = MeasurementsUnits::find($id);
        $measurementsUnits->fill($request->all());
        $measurementsUnits->update();
        flash()->updated();
        return redirect()->route('units.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeasurementsUnits  $measurementsUnits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measurementsUnits = MeasurementsUnits::find($id);
        $measurementsUnits->delete();

        flash()->deleted();
        return redirect()->route('units.index');
    }

    public function list()
    {
        return UnitsTable::generate();
    }
}
