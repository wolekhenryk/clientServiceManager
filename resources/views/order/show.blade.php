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
                    <h3 class="m-1">Zlecenie {{ $order->title }} z dnia {{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</h3>
                    <a href="{{ route('edit-order', $order) }}">
                        <button type="button" class="btn btn-primary m-2">Edytuj zlecenie</button>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Nazwa/tytuł</th>
                            <td>{{ $order->title }}</td>
                        </tr><tr>
                            <th>Opis</th>
                            <td>{{ $order->description }}</td>
                        </tr><tr>
                            <th>Priorytet</th>
                            <td>
                                @if($order->priority === 'high')
                                    <span class="badge text-bg-danger fs-6">Wysoki</span>
                                @elseif($order->priority === 'normal')
                                    <span class="badge text-bg-primary fs-6">Normalny</span>
                                @else
                                    <span class="badge text-bg-secondary fs-6">Niski</span>
                                @endif
                            </td>
                        </tr><tr>
                            <th>Przewidywane ukończenie</th>
                            <td>{{ \Carbon\Carbon::parse($order->due)->format('j F Y') }}</td>
                        </tr><tr>
                            <th>Wycena/kwota</th>
                            <td>{{ $order->amount }}</td>
                        </tr><tr>
                            <th>Status</th>
                            <td>
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
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
