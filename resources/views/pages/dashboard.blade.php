@extends('layouts.main-layout')
@section('content')
    <div id="dashboard">
        <img src="{{asset('storage') . '/'.Auth::user()->image_path}}">
        <h2>{{auth::user()->brand_name}}</h2>
        <h2>{{auth::user()->email}}</h2>
        <h2>{{auth::user()->address}}</h2>
        <h2>{{auth::user()->p_iva}}</h2>
        <h2>{{auth::user()->description}}</h2>
        <h2>{{auth::user()->order_min}}</h2>
        <h2>{{auth::user()->delivery_price}}</h2>
        <a class="btn btn-primary" href="{{route('my_dishes')}}">PIATTI</a>
        <a class="btn btn-primary" href="{{route('my_orders')}}">ORDINI</a>



    </div>
@endsection