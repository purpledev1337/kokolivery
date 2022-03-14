@extends('layouts.main-layout')
@section('content')
<div id="my_dishes">
    <div class="row justify-content-center">
        <h1 class="text-center">Piatti di {{ Auth::user()->brand_name }}</h1>
        <a id="create_plate" class="btn btn-primary col-xs-12 col-md-6" href="{{ route('dish.create') }}" >CREA NUOVO PIATTO</a>
    </div>
    <div id="content_box" class="row position-relative">

        <div
          class="d-flex flex-column align-items-around"
        >

        <div class="row">
            @foreach ($categories as $category)
                
                @if ($category == 'Antipasto')
                <div class="col-12 p-3 order-1">
                    <div class="row justify-content-center">
                        <h2 class="col-12">Antipasto:</h2>
                        @foreach ($dishes as $dish)
                            @if ($dish -> category == 'Antipasto')
                                <div class="{{ !$dish -> is_visible? 'dish_card col-12 p-3 m-1 not_visible':'dish_card col-12 p-3 m-1' }}">
                                    <div class="row">
                                        <div class="col-8 p-3">
                                            <h2>{{ $dish->name }}</h2>
                                            <h5>{{ $dish->description }}</h5>
                                            <h3>{{ $dish->price }} €</h3>
                                            <br/>
                                        </div>
                                        <div class="img_container col-4">
                                            <img class="img-responsive" src="{{asset('storage') . '/' . $dish -> image_path}}">
                                        </div>
                                        <div class="comand_panel col-xs-12">
                                            <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary m-sm-3">MODIFICA</a>
                                            <a href="#"
                                               data-target-id="{{ $dish -> id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#deleteDishConfirmation" 
                                               class="btn btn-danger m-sm-3">
                                               CANCELLA
                                            </a>
                                            <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary m-sm-3">VISIBILITA</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @elseif ($category == 'Primi Piatti')
                <div class="col-12 p-3 order-2">
                    <div class="row justify-content-center">
                        <h2 class="col-12">Primi Piatti:</h2>
                        @foreach ($dishes as $dish)
                            @if ($dish -> category == 'Primi Piatti')
                                <div class="{{ !$dish -> is_visible? 'dish_card col-12 p-3 m-1 not_visible':'dish_card col-12 p-3 m-1' }}">
                                    <div class="row">
                                        <div class="col-8 p-3">
                                            <h2>{{ $dish->name }}</h2>
                                            <h5>{{ $dish->description }}</h5>
                                            <h3>{{ $dish->price }} €</h3>
                                            <br/>
                                        </div>
                                        <div class="img_container col-4">
                                            <img class="img-responsive" src="{{asset('storage') . '/' . $dish -> image_path}}">
                                        </div>
                                        <div class="comand_panel col-xs-12">
                                            <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary m-sm-3">MODIFICA</a>
                                            <a href="#" 
                                               data-target-id="{{ $dish -> id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#deleteDishConfirmation" 
                                               class="btn btn-danger m-sm-3">
                                               CANCELLA
                                            </a>
                                            <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary m-sm-3">VISIBILITA</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @elseif ($category == 'Secondi Piatti')
                <div class="col-12 p-3 order-3">
                    <div class="row justify-content-center">
                        <h2 class="col-12">Secondi Piatti:</h2>
                        @foreach ($dishes as $dish)
                            @if ($dish -> category == 'Secondi Piatti')
                                <div class="{{ !$dish -> is_visible? 'dish_card col-12 p-3 m-1 not_visible':'dish_card col-12 p-3 m-1' }}">
                                    <div class="row">
                                        <div class="col-8 p-3">
                                            <h2>{{ $dish->name }}</h2>
                                            <h5>{{ $dish->description }}</h5>
                                            <h3>{{ $dish->price }} €</h3>
                                            <br/>
                                        </div>
                                        <div class="img_container col-4">
                                            <img class="img-responsive" src="{{asset('storage') . '/' . $dish -> image_path}}">
                                        </div>
                                        <div class="comand_panel col-xs-12">
                                            <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary m-sm-3">MODIFICA</a>
                                            <a href="#" 
                                               data-target-id="{{ $dish -> id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#deleteDishConfirmation" 
                                               class="btn btn-danger m-sm-3">
                                               CANCELLA
                                            </a>
                                            <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary m-sm-3">VISIBILITA</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @elseif ($category == 'Pizza')
                <div class="col-12 p-3 order-4">
                    <div class="row justify-content-center">
                        <h2 class="col-12">Pizza:</h2>
                        @foreach ($dishes as $dish)
                            @if ($dish -> category == 'Pizza')
                                <div class="{{ !$dish -> is_visible? 'dish_card col-12 p-3 m-1 not_visible':'dish_card col-12 p-3 m-1' }}">
                                    <div class="row">
                                        <div class="col-8 p-3">
                                            <h2>{{ $dish->name }}</h2>
                                            <h5>{{ $dish->description }}</h5>
                                            <h3>{{ $dish->price }} €</h3>
                                            <br/>
                                        </div>
                                        <div class="img_container col-4">
                                            <img class="img-responsive" src="{{asset('storage') . '/' . $dish -> image_path}}">
                                        </div>
                                        <div class="comand_panel col-xs-12">
                                            <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary m-sm-3">MODIFICA</a>
                                            <a href="#" 
                                               data-target-id="{{ $dish -> id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#deleteDishConfirmation" 
                                               class="btn btn-danger m-sm-3">
                                               CANCELLA
                                            </a>
                                            <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary m-sm-3">VISIBILITA</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @elseif ($category == 'Dessert')
                <div class="col-12 p-3 order-5">
                    <div class="row justify-content-center">
                        <h2 class="col-12">Dessert:</h2>
                        @foreach ($dishes as $dish)
                            @if ($dish -> category == 'Dessert')
                                <div class="{{ !$dish -> is_visible? 'dish_card col-12 p-3 m-1 not_visible':'dish_card col-12 p-3 m-1' }}">
                                    <div class="row">
                                        <div class="col-8 p-3">
                                            <h2>{{ $dish->name }}</h2>
                                            <h5>{{ $dish->description }}</h5>
                                            <h3>{{ $dish->price }} €</h3>
                                            <br/>
                                        </div>
                                        <div class="img_container col-4">
                                            <img class="img-responsive" src="{{asset('storage') . '/' . $dish -> image_path}}">
                                        </div>
                                        <div class="comand_panel col-xs-12">
                                            <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary m-sm-3">MODIFICA</a>
                                            <a href="#" 
                                               data-target-id="{{ $dish -> id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#deleteDishConfirmation" 
                                               class="btn btn-danger m-sm-3">
                                               CANCELLA
                                            </a>
                                            <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary m-sm-3">VISIBILITA</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @elseif ($category == 'Bibite')
                <div class="col-12 p-3 order-6">
                    <div class="row justify-content-center">
                        <h2 class="col-12">Bibite:</h2>
                        @foreach ($dishes as $dish)
                            @if ($dish -> category == 'Bibite')
                                <div class="{{ !$dish -> is_visible? 'dish_card col-12 p-3 m-1 not_visible':'dish_card col-12 p-3 m-1' }}">
                                    <div class="row">
                                        <div class="col-8 p-3">
                                            <h2>{{ $dish->name }}</h2>
                                            <h5>{{ $dish->description }}</h5>
                                            <h3>{{ $dish->price }} €</h3>
                                            <br/>
                                        </div>
                                        <div class="img_container col-4">
                                            <img class="img-responsive" src="{{asset('storage') . '/' . $dish -> image_path}}">
                                        </div>
                                        <div class="comand_panel col-xs-12">
                                            <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary m-sm-3">MODIFICA</a>
                                            <a href="#" 
                                               data-target-id="{{ $dish -> id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#deleteDishConfirmation" 
                                               class="btn btn-danger m-sm-3">
                                               CANCELLA
                                            </a>
                                            <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary m-sm-3">VISIBILITA</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>

      </div>
</div>

    @include('pages.modal.delete-dish-confirmation')

@endsection