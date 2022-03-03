@extends('layouts.main-layout')

@section('content')

    <div id="cont">
        <div id="cont-logo">
            <div id="cont-img-home">
                <img id="float-img" src="storage/asset/kokolivery-logo.svg" alt="">
            </div>
            <h1 id="float-title">
                Kokolivery
            </h1> 
        </div>
        <div>
            <input type="text" placeholder="Inserisci La Via, La Citta' E La Provincia">
            <button class="btn btn-primary" >SEARCH</button>
        </div>
        
        <a href="{{ route('restaurant_list') }}">Link alla restaurant_list</a>
    </div>

@endsection
