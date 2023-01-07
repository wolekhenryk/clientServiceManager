@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(\Illuminate\Support\Facades\Session::has('delete-danger'))
                <div class="alert alert-danger align-items-center align-content-center" role="alert">
                    {{  \Illuminate\Support\Facades\Session::get('delete-danger') }}
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success align-items-center align-content-center" role="alert">
                    {{  \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Wszyscy klienci</h3>
                    <a href="{{ route('add-client') }}">
                        <button type="button" class="btn btn-primary float-end">
                            Dodaj klienta
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imię i nazwisko</th>
                            <th scope="col">Kontakt</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Ilość zleceń</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Zlecenie</th>
                            <th scope="col">Edycja</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>
                                    <a href="{{ route('show-client', $client->id) }}">
                                        {{ $client->name }} {{ $client->surname }}
                                    </a>
                                </td>
                                <td>{{ $client->contact }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($client->address, 32) }}</td>
                                <td>{{ $client->orders()->count() }}</td>
                                <td>{{ \Carbon\Carbon::parse($client->created_at)->format('d.m.Y')  }}</td>
                                <td>
                                    <a href="{{ route('create-order', $client->id) }}">Dodaj</a>
                                </td>
                                <td>
                                    <a href="{{ route('edit-client', $client->id) }}">Edytuj</a>
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
