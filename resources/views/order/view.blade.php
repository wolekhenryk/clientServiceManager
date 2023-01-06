@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="display-6 mb-0">Wszystkie zlecenia</p>
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
                            <th scope="col">Klient</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Akcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="align-items-center justify-content-center">
                                <th class="align-middle">{{ $order->id }}</th>
                                <th class="align-middle">{{ $order->title }}</th>
                                <th class="align-middle">{{ \Illuminate\Support\Str::limit($order->description, 50) }}</th>
                                <th class="align-middle">{{ $order->priority }}</th>
                                <th class="align-middle text-justify">{{ \Carbon\Carbon::parse($order->due)->format('j F Y') }}</th>
                                <th class="align-middle">{{ $order->amount }} PLN</th>
                                <th class="align-middle">{{ $order->client->name  }} {{ __(' ') }} {{ $order->client->surname }}</th>
                                <th class="align-middle">{{ \Carbon\Carbon::parse($order->created_at)->format('j F Y') }}</th>
                                <th class="align-middle">
                                    <a href="">
                                        Szczegóły
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
