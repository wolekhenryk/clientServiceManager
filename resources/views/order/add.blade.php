@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-primary" role="alert">
                Dodajesz zlecenie które zostanie przypisane do konkretnego klienta. Klient po utworzeniu konta będzie mógł sprawdzić zlecenia przypisane do jego konta, a także status ich realizacji.
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="display-6 mb-0">Klient: {{ $client->name }} {{ __(' ') }} {{ $client->surname }}</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save-order', $client) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Tytuł/nazwa zlecenia') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="priority" class="col-md-4 col-form-label text-md-end">{{ __('Priorytet zlecenia') }}</label>

                            <div class="col-md-6">
                                {{--<input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required>--}}
                                <select class="form-select @error('priority') is-invalid @enderror" name="priority" id="priority">
                                    <option selected>Wybierz z listy</option>
                                    <option value="high">Wysoki</option>
                                    <option value="normal">Normalny</option>
                                    <option value="low">Niski</option>
                                </select>
                                @error('priority')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="due" class="col-md-4 col-form-label text-md-end">{{ __('Szacowany termin wykonania zlecenia') }}</label>

                            <div class="col-md-6">
                                <input id="due" type="date" class="form-control @error('due') is-invalid @enderror" name="due" value="{{ old('due') }}" required>

                                @error('due')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Wycena zlecenia (oddzielone kropką)') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required>

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis zlecenia, życzenia klienta') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" placeholder="Opcjonalne" id="description" name="description"></textarea>
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
                                    {{ __('Zapisz zlecenie') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
