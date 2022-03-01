@extends('layouts.main-layout')

@section('content')

    <form class="row g-3 container m-auto"
    method="POST"
    action="{{ route('dish.store') }}"
    enctype="multipart/form-data">
    @method('POST')
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- brand name --}}
    <div class="col-md-6">
    <label for="name" class="form-label">Dish Name</label>
    <input type="text" name="name" class="form-control">
    </div>

    {{-- email --}}
    <div class="col-md-6">
    <label for="description" class="form-label">Descrizione</label>
    <input type="text" name="description" class="form-control">
    </div>

    {{-- image_path --}}
    <div class="mb-3 col-6">
        <label for="image_path" class="form-label">Inserisci la foto del tuo piatto</label>
        <input class="form-control" type="file" name="image_path">
    </div>

    {{-- password confirmation --}}
    <div class="col-md-6">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control">
    </div>

    {{-- Category --}}
    <div class="col-6 offset-3">
    <label for="category" class="form-label">Category</label><br>
    <select class="form-select form-control" name="category" aria-label="Default select example">
        <option selected hidden>Open this select menu</option>
        <option value="Antipasto">Antipasto</option> 
        <option value="Primi Piatti">Primi Piatti</option> 
        <option value="Secondi Piatti">Secondi Piatti</option> 
        <option value="Dessert">Dessert</option> 
        <option value="Bibite">Bibite</option> 
        <option value="Pizza">Pizza</option>
    </select>
    </div>
       
    <button type="SUBMIT">Crea</button>
    </form>

@endsection
