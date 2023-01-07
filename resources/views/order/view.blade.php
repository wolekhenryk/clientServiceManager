@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Wszystkie zlecenia</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa/tytuł</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Priorytet</th>
                            <th scope="col">Przewidywane ukończenie</th>
                            <th scope="col">Wycena/kwota</th>
                            <th scope="col">Klient</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="align-items-center justify-content-center">
                                <th class="align-middle">{{ $order->id }}</th>
                                <th class="align-middle">
                                    <a href="{{ route('show-order', $order) }}">
                                        {{ \Illuminate\Support\Str::limit($order->title, 32) }}
                                    </a>
                                </th>
                                <th class="align-middle">{{ \Illuminate\Support\Str::limit($order->description, 64) }}</th>
                                <th class="align-middle" scope="row">
                                    @if($order->priority === 'high')
                                        <span class="badge text-bg-danger fs-6">Wysoki</span>
                                    @elseif($order->priority === 'normal')
                                        <span class="badge text-bg-primary fs-6">Normalny</span>
                                    @else
                                        <span class="badge text-bg-secondary fs-6">Niski</span>
                                    @endif
                                </th>
                                <th class="align-middle text-justify">{{ \Carbon\Carbon::parse($order->due)->format('j F Y') }}</th>
                                <th class="align-middle">{{ $order->amount }} PLN</th>
                                <th class="align-middle">{{ $order->client->name  }} {{ __(' ') }} {{ $order->client->surname }}</th>
                                <th class="align-middle">{{ \Carbon\Carbon::parse($order->created_at)->format('j F Y') }}</th>
                                <th class="align-middle">
                                    @if($order->status === 'pending')
                                        <span class="badge text-bg-primary fs-6">Zapisane</span>
                                    @elseif($order->status === 'confirmed')
                                        <span class="badge text-bg-info fs-6">W trakcie</span>
                                    @elseif($order->status === 'finished')
                                        <span class="badge text-bg-success fs-6">Zakończone</span>
                                    @elseif($order->status === 'cancelled')
                                        <span class="badge text-bg-danger fs-6">Anulowane</span>
                                    @else
                                        <span class="badge text-bg-warning fs-6">Problem</span>
                                    @endif
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
