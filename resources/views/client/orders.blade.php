@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Klient: {{ $client->name }} {{ $client->surname }}</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa/tytuł</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Priorytet</th>
                            <th scope="col">Przewidywany termin</th>
                            <th scope="col">Wycena/kwota</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <th scope="row">
                                    <a href="{{ route('show-order', $order->id) }}">
                                        {{ \Illuminate\Support\Str::limit($order->title, 32) }}
                                    </a>
                                </th>
                                <th scope="row">{{ \Illuminate\Support\Str::limit($order->description, 64) }}</th>
                                <th scope="row">
                                    @if($order->priority === 'high')
                                        <span class="badge text-bg-danger fs-6">Wysoki</span>
                                    @elseif($order->priority === 'normal')
                                        <span class="badge text-bg-primary fs-6">Normalny</span>
                                    @else
                                        <span class="badge text-bg-secondary fs-6">Niski</span>
                                    @endif
                                </th>
                                <th scope="row">{{ \Carbon\Carbon::parse($order->due)->diffForHumans() }} ({{ \Carbon\Carbon::parse($order->due)->format('d.m.Y') }})</th>
                                <th scope="row">{{ $order->amount }} PLN</th>
                                <?php setlocale(LC_ALL, 'pl_PL', 'pl', 'Polish_Poland.28592'); ?>
                                <th scope="row">{{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</th>
                                <th scope="row">
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
