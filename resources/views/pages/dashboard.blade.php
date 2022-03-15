@extends('layouts.main-layout')
@section('content')
    <div id="dashboard" class="row align-items-center pt-3">
        <div class="col-md-3 order-2">
            <div class="row">
                    <a class="btn btn-primary offset-3 col-6 my-3" href="{{route('myDishes')}}">PIATTI</a>
            </div>
            <div class="row">
                    <a class="btn btn-primary offset-3 col-6 my-3" href="{{route('my_orders')}}">ORDINI</a>
            </div>
            <div class="row">
                <a class="btn btn-secondary offset-3 col-6 my-3" href="{{route('restaurant.edit')}}">MODIFICA</a>
            </div>
            <div class="row">
                <a  href="#" 
                data-target-id="{{Auth::user()->id}}" 
                data-bs-toggle="modal" 
                data-bs-target="#deleteRestaurantConfirmation" 
                class="btn btn-danger offset-3 col-6 my-3">
                CANCELLA
                </a>
            </div>
            
        </div>
        <div class="col-md-9 order-1 ps-5">
            <div class="img_container">
                <img src="{{asset('storage') . '/' . Auth::user()->image}}">
            </div>
            <h1 class="text-center my-3">{{Auth::user()->brand_name}}</h1>
            <h4>Tipologia: 
                @foreach (Auth::user()->types as $type)
                    {{$type -> name}} |
                @endforeach
            </h4>
            <h4>Email: {{Auth::user()->email}}</h4>
            <h4>Indirizzo: {{Auth::user()->address}}</h4>
            <h4>P.IVA: {{Auth::user()->p_iva}}</h4>
            <h4>Descrizione: {{Auth::user()->description}}</h4>
            <h4>Ordine minimo: {{Auth::user()->order_min}}€</h4>
            <h4>Prezzo consegna: {{Auth::user()->delivery_price}}€</h4>
        </div>
    </div>

    {{-- modale alert delete --}}
    @include('pages.modal.delete-restaurant-confirmation')
@endsection