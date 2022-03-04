@extends('layouts.main-layout')

@section('content')

    <div id="search_home">
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
    <img id="banner_svg" src="storage/asset/banner_home4.svg" alt="">

    <div class="container content">
        <div class="row flex-nowrap overflow-auto row-cols-2 row-cols-md-4 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ristornate</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
