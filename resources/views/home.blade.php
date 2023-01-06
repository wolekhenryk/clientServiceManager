@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success align-items-center align-content-center" role="alert">
                {{  \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p class="display-6 mb-0">Główny panel</p>
                <a href="{{ route('add-client') }}">
                    <button type="button" class="btn btn-primary float-end">
                        Dodaj klienta
                    </button>
                </a>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
