<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Salesman;
use App\Models\Customers;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Orders::all();
        $customer = Customers::all();
        $salesman = Salesman::all();

        return view('orders', compact('order', 'customer', 'salesman'));
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
    public function store(StoreOrdersRequest $request)
    {
        Orders::create($request->validated());
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $order)
    {
        if ($order) {
            $order->update($request->validated());
            return redirect()->route('orders.index')->with('success', 'Order updated successfully');
        }
        return redirect()->route('orders.index')->with('error', 'Order not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $order)
    {
        if ($order) {
            $order->delete();
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
        }
        return redirect()->route('orders.index')->with('error', 'Order not found');
    }
}
