<?php

namespace App\Http\Controllers\Order;


use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Tariff;
use Illuminate\Http\Request;



class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('tariff')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tariffs = Tariff::all();
        $schedule_types = [
            'EVERY_DAY' => 'Every day',
            'EVERY_OTHER_DAY' => 'Every other day',
            'EVERY_OTHER_DAY_TWICE' => 'Every other day twice',
        ];

        return view('orders.create', compact('tariffs', 'schedule_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('ration')->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
