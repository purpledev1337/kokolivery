@extends('layouts.main-layout')
@section('content')
<h2>Ordini:</h2>

@foreach ($listOrders as $orders)

    @foreach ($orders as $order)


    {{-- <h3>{{ $order -> pivot -> quantity }}</h3>
    <h3>{{ $order -> dishes }}</h3>
    <hr>
    <br> --}}

        @foreach ($order -> dishes as $dish)

            
            {{ $dish -> name }} -     
        
        
            {{ $dish -> price }} - 
        
        
            {{ $dish -> category }} -
            
            {{ $dish -> pivot -> quantity }}
            <br>

        @endforeach

        <hr>
    @endforeach

@endforeach
@endsection