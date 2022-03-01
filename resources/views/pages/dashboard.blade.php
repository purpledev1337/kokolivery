@extends('layouts.main-layout')
@section('content')
    <div id="dashboard" class="text-center">
        <div id="cont-img">
            {{-- <img src="{{asset('storage') . '/'.Auth::user()->image_path}}"> --}}
        </div>
        <h2>{{Auth::user()->brand_name}}</h2>
        <h2>{{Auth::user()->email}}</h2>
        <h2>{{Auth::user()->address}}</h2>
        <h2>{{Auth::user()->p_iva}}</h2>
        <h2>{{Auth::user()->description}}</h2>
        <h2>{{Auth::user()->order_min}}</h2>
        <h2>{{Auth::user()->delivery_price}}</h2>
        <a class="btn btn-primary" href="{{route('myDishes')}}">PIATTI</a>
        <a class="btn btn-primary" href="{{route('my_orders')}}">ORDINI</a>
        <a class="btn btn-secondary" href="{{route('restaurant.edit')}}">EDIT</a>
        <a class="btn btn-danger" href="{{route('restaurant.delete')}}">DELETE</a>

    </div>
@endsection