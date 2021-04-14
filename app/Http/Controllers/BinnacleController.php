<?php

namespace App\Http\Controllers;

use App\DataTables\BinnaclesTable;
use App\Models\Activity;
use Illuminate\Http\Request;

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

    public function show(Activity $activity)
    {
        return view('binnacles.show', compact('activity'));
    }
}
