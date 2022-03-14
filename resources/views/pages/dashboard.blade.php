@extends('layouts.main-layout')
@section('content')
    <div id="dashboard" class="row align-items-center">
        <div class="col-md-3">
            <div class="row">
                    <a class="btn btn-primary offset-3 col-6 mb-5" href="{{route('myDishes')}}">PIATTI</a>
            </div>
            <div class="row">
                    <a class="btn btn-primary offset-3 col-6" href="{{route('my_orders')}}">ORDINI</a>
            </div>
        </div>
        <div class="col-md-9">
            <div id="cont-img">
                <img src="{{asset('storage/asset') . '/' . Auth::user()->image}}">
            </div>
            <h1 class="text-center">{{Auth::user()->brand_name}}</h1>
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
            <a class="btn btn-secondary" href="{{route('restaurant.edit')}}">MODIFICA</a>
            <a  href="#" 
            data-target-id="{{Auth::user()->id}}" 
            data-bs-toggle="modal" 
            data-bs-target="#deleteRestaurantConfirmation" 
            class="btn btn-danger">
            CANCELLA
            </a>
        </div>
    </div>

    {{-- modale alert delete --}}
    @include('pages.modal.delete-restaurant-confirmation')
@endsection