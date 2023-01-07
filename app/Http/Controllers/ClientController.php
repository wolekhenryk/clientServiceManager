<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('orders')->orderByDesc('id')->get();

        return view('client.view-clients', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add-client');
    }

    public function store(Request $request)
    {
        $client = new Client();
        $client->fill($request->all());
        $client->save();
        return redirect('/home')->with('success', 'Zapisano klienta');
    }

    public function show(Client $client)
    {
        $orders = DB::table('orders')->where('client_id', $client->id)->orderByDesc('id')->get();
        return view('client.orders', [
            'orders' => $orders,
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return redirect(route('view-clients'))->with('success', 'Zapisano zmiany w danych klienta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect(route('view-clients'))->with('delete-danger', 'Klient został usunięty z bazy danych');
    }
}
