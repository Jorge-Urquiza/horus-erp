<?php

namespace App\Http\Controllers;

use App\Models\IncomeNote;
use Illuminate\Http\Request;
use App\DataTables\IncomeNoteTable;
use App\Http\Requests\incomes\StoreIncomeRequest;
use App\Models\BranchOffice;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incomes.index');
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
        $products = Product::all();
        return view('incomes.create',compact('branch_office', 'fecha','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        try {
            DB::beginTransaction();
            DB::commit();
            return ;
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
               ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeNote $incomeNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeNote $incomeNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeNote $incomeNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeNote  $incomeNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeNote $incomeNote)
    {
        //
    }

    public function list()
    {
        return IncomeNoteTable::generate();
    }
}
