<?php

namespace App\Http\Controllers;

use App\Models\Salesman;
use App\Http\Requests\StoreSalesmanRequest;
use App\Http\Requests\UpdateSalesmanRequest;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesman = Salesman::all();
        return view('salesman', compact('salesman'));
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
    public function store(StoreSalesmanRequest $request)
    {
        Salesman::create($request->validated());
        return redirect()->route('salesman.index')->with('success', 'Salesman created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salesman $salesman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salesman $salesman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesmanRequest $request, Salesman $salesman)
    {
        if ($salesman) {
            $salesman->update($request->validated());
            return redirect()->route('salesman.index')->with('success', 'Salesman updated successfully');
        }
        return redirect()->route('salesman.index')->with('error', 'Salesman not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salesman $salesman)
    {
        if ($salesman) {
            $salesman->delete();
            return redirect()->route('salesman.index')->with('success', 'Salesman deleted successfully');
        }
        return redirect()->route('salesman.index')->with('error', 'Salesman not found');
    }
}
