<?php

namespace App\Http\Controllers;

use App\DataTables\OutputNoteTable;
use App\Models\BranchOffice;
use App\Models\OutputNote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutputNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outputs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = Carbon::now('America/La_paz');
        $fecha = $mytime->toDateString();
        $branch_office = BranchOffice::get();
        $branch_user= Auth::user();
        return view('outputs.create',compact('branch_office', 'fecha'));
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
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function show(OutputNote $outputNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function edit(OutputNote $outputNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutputNote $outputNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutputNote  $outputNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutputNote $outputNote)
    {
        //
    }

    public function list()
    {
        return OutputNoteTable::generate();
    }
}
