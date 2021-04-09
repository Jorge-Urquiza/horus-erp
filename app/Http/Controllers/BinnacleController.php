<?php

namespace App\Http\Controllers;

use App\DataTables\BinnaclesTable;

class BinnacleController extends Controller
{
    public function index()
    {
        dd(BinnaclesTable::generate());
        //return view('binnacles.index');
    }

    public function list()
    {
        return BinnaclesTable::generate();
    }
}
