@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Karta klienta</h3>
                    <div class="d-inline-flex">
                        <a href="{{ route('edit-client', $client->id) }}">
                            <button type="button" class="btn btn-primary float-end m-2">
                                Edytuj dane klienta
                            </button>
                        </a>
                        <a href="{{ route('create-order', $client->id) }}">
                            <button type="button" class="btn btn-secondary float-end m-2">
                                Dodaj zlecenie dla klienta
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger float-end m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Usuń klienta
                        </button>
                    </div>
                </div>
                <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Uwaga! Tej czynności nie można cofnąć</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('destroy-client', $client->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="alert alert-danger align-items-center align-content-center">
                                        Wraz z usunięciem klienta wiąże się usunięcie wszystkich przypisanych wcześniej do niego zleceń
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tak, permanentnie usuń klienta
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-danger mt-3" data-bs-dismiss="modal">Usuń</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th class="align-middle">Imię i nazwisko</th>
                            <td class="align-middle">{{ $client->name }} {{ $client->surname }}</td>
                        </tr><tr>
                            <th class="align-middle">Dane kontaktowe</th>
                            <td class="align-middle">{{ $client->contact }}</td>
                        </tr><tr>
                            <th class="align-middle">Adres zamieszkania</th>
                            <td class="align-middle">{{ $client->address }}</td>
                        </tr><tr>
                            <th class="align-middle">Opis/uwagi</th>
                            <td class="align-middle">{{ $client->description }}</td>
                        </tr><tr>
                            <th class="align-middle">Data dodania</th>
                            <td class="align-middle">{{ \Illuminate\Support\Carbon::parse($client->created_at)->format('d.m.Y') }}</td>
                        </tr><tr>
                            <th class="align-middle">Ilość aktywnych zleceń</th>
                            <td class="align-middle">{{ $client->orders()->count() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Zlecenia klienta</h3>
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
                            <th scope="col">Data dodania</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="align-items-center justify-content-center">
                                <td class="align-middle">{{ $order->id }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('show-order', $order->id) }}">
                                        {{ \Illuminate\Support\Str::limit($order->title, 32) }}
                                    </a>
                                </td>
                                <td class="align-middle">{{ \Illuminate\Support\Str::limit($order->description, 64) }}</t>
                                <td class="align-middle" scope="row">
                                    @if($order->priority === 'high')
                                        <span class="badge text-bg-danger fs-6">Wysoki</span>
                                    @elseif($order->priority === 'normal')
                                        <span class="badge text-bg-primary fs-6">Normalny</span>
                                    @else
                                        <span class="badge text-bg-secondary fs-6">Niski</span>
                                    @endif
                                </td>
                                <td class="align-middle text-justify">{{ \Carbon\Carbon::parse($order->due)->format('j F Y') }}</td>
                                <td class="align-middle">{{ $order->amount }} PLN</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($order->created_at)->format('j F Y') }}</td>
                                <td class="align-middle">
                                    @if($order->status === 'pending')
                                        <span class="badge text-bg-secondary fs-6">Zapisane</span>
                                    @elseif($order->status === 'paid')
                                        <span class="badge text-bg-primary fs-6">Opłacone</span>
                                    @elseif($order->status === 'finished')
                                        <span class="badge text-bg-success fs-6">Zakończone</span>
                                    @elseif($order->status === 'cancelled')
                                        <span class="badge text-bg-danger fs-6">Anulowane</span>
                                    @else
                                        <span class="badge text-bg-warning fs-6">Problem</span>
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
