@extends('layouts.main-layout')
@section('content')
<h2>Ordini:</h2>

@foreach ($listOrders as $orders)

    {{-- <div>
        {{ $orders -> dishes() }}
    </div> --}}
    @foreach ($orders as $order)

    <h3>{{ $order -> dishes }}</h3>
    @endforeach
@endforeach
@endsection