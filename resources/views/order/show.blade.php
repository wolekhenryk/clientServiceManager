@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(\Illuminate\Support\Facades\Session::has('order-success'))
                <div class="alert alert-success align-items-center align-content-center" role="alert">
                    {{  \Illuminate\Support\Facades\Session::get('order-success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-1">Zlecenie: {{ $order->title }} z dnia {{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</h3>
                    <div class="d-inline-flex">
                        <a href="{{ route('edit-order', $order) }}">
                            <button type="button" class="btn btn-primary m-2">Edytuj zlecenie</button>
                        </a>
                        <form method="post" action="{{ route('destroy-order', $order->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger m-2">Usuń zlecenie</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th class="align-middle">Nazwa/tytuł</th>
                            <td class="align-middle">{{ $order->title }}</td>
                        </tr><tr>
                            <th class="align-middle">Opis</th>
                            <td class="align-middle">{{ $order->description }}</td>
                        </tr><tr>
                            <th class="align-middle">Priorytet</th>
                            <td class="align-middle">
                                @if($order->priority === 'high')
                                    <span class="badge text-bg-danger fs-6">Wysoki</span>
                                @elseif($order->priority === 'normal')
                                    <span class="badge text-bg-primary fs-6">Normalny</span>
                                @else
                                    <span class="badge text-bg-secondary fs-6">Niski</span>
                                @endif
                            </td>
                        </tr><tr>
                            <th class="align-middle">Przewidywane ukończenie</th>
                            <td class="align-middle">{{ \Carbon\Carbon::parse($order->due)->format('j F Y') }}</td>
                        </tr><tr>
                            <th class="align-middle">Wycena/kwota</th>
                            <td class="align-middle">{{ $order->amount }}</td>
                        </tr><tr>
                            <th class="align-middle">Status</th>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
