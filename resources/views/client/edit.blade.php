@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="alert alert-primary align-items-center align-content-center">
            Edytujesz klienta
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="m-1">Klient: {{ $client->name }} {{ $client->surname }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('update-client', $client->id) }}">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Imię') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Nazwisko') }}</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $client->surname }}" required>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Kontakt (telefon/email)') }}</label>

                        <div class="col-md-6">
                            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $client->contact }}" required>

                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Adres zamieszkania') }}</label>

                        <div class="col-md-6">
                            <input id="address" placeholder="Opcjonalne" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $client->address }}">

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis/uwagi') }}</label>
                        <div class="col-md-6">
                            <textarea class="form-control" style="height: 200px" placeholder="Opcjonalne" id="description" name="description">{{ $client->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Zapisz zmiany') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
