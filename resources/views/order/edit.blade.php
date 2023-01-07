@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-primary" role="alert">
                Pamiętaj, aby zmiany treści zlecenia były przemyślane.
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Zlecenie {{ $order->title }} - edycja</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-order', $order) }}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Tytuł/nazwa zlecenia') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $order->title }}" required>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status zlecenia') }}</label>

                            <div class="col-md-6">
                                {{--<input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required>--}}
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                    <option @if($order->status === 'pending') selected @endif value="pending">Zapisane</option>
                                    <option @if($order->status === 'paid') selected @endif value="paid">Opłacone</option>
                                    <option @if($order->status === 'finished') selected @endif value="finished">Zakończone</option>
                                    <option @if($order->status === 'cancelled') selected @endif value="cancelled">Anulowane</option>
                                    <option @if($order->status === 'problem') selected @endif value="problem">Problem</option>
                                </select>
                                @error('status')
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
                                    <option @if($order->priority === 'high') selected @endif value="high">Wysoki</option>
                                    <option @if($order->priority === 'normal') selected @endif value="normal">Normalny</option>
                                    <option @if($order->priority === 'low') selected @endif value="low">Niski</option>
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
                                <input id="due" type="date" class="form-control @error('due') is-invalid @enderror" name="due" value="{{ \Illuminate\Support\Carbon::parse($order->due)->format('Y-m-d') }}" required>

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
                                <input id="amount" type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $order->amount }}" required>

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
                                <textarea class="form-control" style="height: 200px" placeholder="Opcjonalne" id="description" name="description">{{ $order->description }}</textarea>
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
