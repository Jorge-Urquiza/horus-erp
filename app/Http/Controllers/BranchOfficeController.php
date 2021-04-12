<?php

namespace App\Http\Controllers;

use App\DataTables\BranchOfficesTable;
use App\Enums\Message;
use App\Http\Requests\branchOffices\StoreBranchOfficeRequest;
use App\Http\Requests\branchOffices\UpdateBranchOfficeRequest;
use App\Models\BranchOffice;

class BranchOfficeController extends Controller
{

    public function index()
    {
        return view('branch-offices.index');
    }

    public function create()
    {
        return view('branch-offices.create');
    }


    public function store(StoreBranchOfficeRequest $request)
    {
        BranchOffice::create($request->validated());

        flash(Message::STORED);

        return redirect()->route('branch-offices.index');
    }

    public function edit(BranchOffice $branchOffice)
    {
        return view('branch-offices.edit', compact('branchOffice'));
    }

    public function update(UpdateBranchOfficeRequest $request, BranchOffice $branchOffice)
    {
        $branchOffice->fill($request->validated());

        $branchOffice->save();

        flash(Message::UPDATED);

        return redirect()->route('branch-offices.index');
    }

    public function destroy(BranchOffice $branchOffice)
    {
        $branchOffice->delete();

        flash(Message::DELETED);

        return redirect()->route('branch-offices.index');
    }

    public function list()
    {
        return BranchOfficesTable::generate();
    }
}
