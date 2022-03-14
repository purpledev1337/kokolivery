@extends('layouts.main-layout')
@section('content')
<h2>Ordini:</h2>
<div>
    <chart-component></chart-component>
</div>
@foreach ($listOrders as $orders)

    @foreach ($orders as $order)

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