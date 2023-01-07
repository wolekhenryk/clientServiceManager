@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(\Illuminate\Support\Facades\Session::has('delete-danger'))
                <div class="alert alert-danger align-items-center align-content-center" role="alert">
                    {{  \Illuminate\Support\Facades\Session::get('delete-danger') }}
                </div>
            @endif
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
                            <th scope="col">Płatność</th>
                            <th scope="col">Klient</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="align-items-center justify-content-center">
                                <td class="align-middle">{{ $order->id }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('show-order', $order) }}">
                                        {{ \Illuminate\Support\Str::limit($order->title, 32) }}
                                    </a>
                                </td>
                                <td class="align-middle">{{ \Illuminate\Support\Str::limit($order->description, 64) }}</td>
                                <td class="align-middle" scope="row">
                                    @if($order->priority === 'high')
                                        <span class="badge text-bg-danger">Wysoki</span>
                                    @elseif($order->priority === 'normal')
                                        <span class="badge text-bg-primary">Normalny</span>
                                    @else
                                        <span class="badge text-bg-secondary">Niski</span>
                                    @endif
                                </td>
                                <td class="align-middle text-justify">{{ \Carbon\Carbon::parse($order->due)->format('d.m.Y') }}</td>
                                <td class="align-middle">{{ $order->amount }} PLN</td>
                                <td class="align-middle">
                                    @if($order->payment_type === 'in-advance')
                                        <span class="badge text-bg-success">Z góry</span>
                                    @else
                                        <span class="badge text-bg-primary">Przy odbiorze</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $order->client->name  }} {{ __(' ') }} {{ $order->client->surname }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</td>
                                <td class="align-middle">
                                    @if($order->status === 'pending')
                                        <span class="badge text-bg-secondary">Zapisane</span>
                                    @elseif($order->status === 'paid')
                                        <span class="badge text-bg-primary">Opłacone</span>
                                    @elseif($order->status === 'finished')
                                        <span class="badge text-bg-success">Zakończone</span>
                                    @elseif($order->status === 'cancelled')
                                        <span class="badge text-bg-danger">Anulowane</span>
                                    @else
                                        <span class="badge text-bg-warning">Problem</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
