@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="display-6 mb-0">Wszyscy klienci</p>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Kontakt</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Ilość zleceń</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Akcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                <th scope="row">
                                    <a href="{{ route('show-client', $client->id) }}">
                                        {{ $client->name }}
                                    </a>
                                </th>
                                <th scope="row">{{ $client->surname }}</th>
                                <th scope="row">{{ $client->contact }}</th>
                                <th scope="row">{{ $client->address }}</th>
                                <th scope="row">{{ $client->orders()->count() }}</th>
                                <th scope="row">{{ \Carbon\Carbon::parse($client->created_at)->format('j F Y')  }}</th>
                                <th scope="row">
                                    <a href="{{ route('create-order', $client->id) }}">Dodaj zlecenie</a>
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
