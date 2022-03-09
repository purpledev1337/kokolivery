@extends('layouts.main-layout')
@section('content')

    {{-- <statistics-component></statistics-component> --}}
    {{-- <graphic-component></graphic-component> --}}

    <script src="{{asset('js/app.js')}}"></script>
    <statistics-component></statistics-component>
    <h2>Ordini:</h2>
@foreach ($listOrders as $orders)

    @foreach ($orders as $order)

        @foreach ($order -> dishes as $dish)
            
            ({{ $dish -> pivot -> order_id }}) -

            {{ $dish -> name }} -     
        
            {{ $dish -> price }} - 
        
            {{ $dish -> category }} -
            
            {{ $dish -> pivot -> quantity }}

        @endforeach

        <hr>
    @endforeach

@endforeach

@endsection