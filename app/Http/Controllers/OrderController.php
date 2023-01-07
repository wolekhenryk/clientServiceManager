<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('client')->orderByDesc('id')->get();

        return view('order.view', [
            'orders' => $orders,
        ]);
    }

    public function create(Client $client)
    {
        return view('order.add', [
            'client' => $client
        ]);
    }

    public function store(Request $request, Client $client)
    {
        $order = new Order();
        $order->fill($request->all());
        $client->orders()->save($order);
        return redirect('home')->with('success', 'Dodano nowe zlecenie');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect(route('show-order', $order))->with('order-success', 'Zapisano zmiany w poniższym zleceniu.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
