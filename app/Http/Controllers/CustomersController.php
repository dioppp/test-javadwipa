<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customers::all();
        return view('customers', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request)
    {
        Customers::create($request->validated());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, Customers $customer)
    {
        if ($customer) {
            $customer->update($request->validated());
            return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
        }
        return redirect()->route('customers.index')->with('error', 'Customer not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customer)
    {
        if ($customer) {
            $customer->delete();
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
        }
        return redirect()->route('customers.index')->with('error', 'Customer not found');
    }
}
