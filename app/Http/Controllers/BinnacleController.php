<?php

namespace App\Http\Controllers;

use App\DataTables\BinnaclesTable;

class BinnacleController extends Controller
{
    public function index()
    {
        return view('binnacles.index');
    }

    public function list()
    {
        return BinnaclesTable::generate();

    }


}
