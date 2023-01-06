@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="display-6 mb-0">Klient: {{ $client->name }} {{ $client->surname }}</p>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa/tytuł</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Priorytet</th>
                            <th scope="col">Przewidywana data ukończenia</th>
                            <th scope="col">Wycena/kwota</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Akcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <th scope="row">{{ $order->title }}</th>
                                <th scope="row">{{ $order->description }}</th>
                                <th scope="row">{{ $order->priority }}</th>
                                <th scope="row">{{ \Carbon\Carbon::parse($order->due)->format('j F Y') }}</th>
                                <th scope="row">{{ $order->amount }} PLN</th>
                                <th scope="row">{{ \Carbon\Carbon::parse($order->created_at)->format('j F Y') }}</th>
                                <th scope="row">
                                    <a href="">
                                        Edytuj
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
