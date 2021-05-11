<?php

namespace App\Http\Controllers;

use App\DataTables\CustomersTable;
use App\Enums\Message;
use App\Http\Requests\customers\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:customers.create')->only(['create']);
        $this->middleware('permission:customers.index')->only(['index','show']);
        $this->middleware('permission:customers.destroy')->only(['destroy']);
        $this->middleware('permission:customers.edit')->only(['edit']);
    }

    public function index()
    {
        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }


    public function store(StoreCustomerRequest $request)
    {

        Customer::create($request->validated());

        flash(Message::STORED);

        return redirect()->route('customers.index');
    }


    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->fill($request->all());

        $customer->save();

        flash()->updated();

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        flash()->deleted();

        return redirect()->route('customers.index');
    }

    public function list()
    {
        return CustomersTable::generate();
    }
}
