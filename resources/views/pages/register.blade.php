@extends('layouts.main-layout')
@section('content')
    <form class="row g-3 container m-auto"
          method="POST"
          action="{{ route('register') }}"
          enctype="multipart/form-data">
          @method('POST')
          @csrf

        {{-- brand name --}}
        <div class="col-md-6">
            <label for="brand_name" class="form-label">Nome del ristorante</label>
            <input type="text" name="brand_name" class="form-control">
        </div>

        {{-- email --}}
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        
        {{-- password  --}}
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        {{-- password confirmation --}}
        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Conferma Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        {{-- address --}}
        <div class="col-6">
            <label for="address" class="form-label">Strada/Via/Piazza</label>
            <input type="text" name="address" class="form-control">
        </div>

        {{-- city --}}
        <div class="col-6">
            <label for="city" class="form-label">Città</label><br>
            <select class="form-select form-control" name="city" aria-label="Default select example">
                <option disabled selected>Inserisci la tua città</option>
                <option value="Milano">Milano</option> 
                <option value="Napoli">Napoli</option> 
                <option value="Roma">Roma</option> 
                <option value="Bologna">Bologna</option> 
                <option value="Firenze">Firenze</option> 
                <option value="Venezia">Venezia</option> 
                <option value="Torino">Torino</option> 
                <option value="Pisa">Pisa</option> 
                <option value="Bari">Bari</option> 
                <option value="Palermo">Palermo</option> 
                <option value="Cosenza">Cosenza</option> 
                <option value="Cagliari">Cagliari</option> 
            </select>
        </div>

        {{-- p.iva --}}
        <div class="col-6">
            <label for="p_iva" class="form-label">Partita Iva</label>
            <input type="text" name="p_iva" class="form-control">
        </div>

        {{-- path img --}}
        <div class="mb-3 col-6">
            <label for="image" class="form-label">Inserisci la foto del tuo ristorante</label>
            <input class="form-control" type="file" name="image">
        </div>

        {{-- order min --}}
        <div class="col-4">
            <label for="order_min" class="form-label">Ordine Min</label>
            <input type="number" step="0.01" name="order_min" class="form-control">
        </div>

        {{-- Delivery price --}}
        <div class="col-4">
            <label for="delivery_price" class="form-label">Prezzo Consegna </label>
            <input type="number" step="0.01" name="delivery_price" class="form-control">
        </div>
        
        {{-- discount --}}
        <div class="col-4">
            <label for="discount" class="form-label">Sconti</label>
            <input type="number" name="discount" class="form-control">
        </div> 
        
        {{-- tipologia ristornate --}}
        <div class="col-12">
            <label for="name" class="form-label">Tipologia Ristorante</label><br>
            @foreach ($types as $type)
                <input class="form-check-input" type="checkbox" name="types[]" value="{{$type->id}}"> {{$type->name}}
            @endforeach
        </div> 
        
        {{-- descrizione --}}
        <div class="offset-3 col-6">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
        </div>

        <a href="{{ route('home') }}" class="btn btn-danger offset-5 col-1 me-1" type="submit" >CANCELLA</a>
        <button class="btn btn-secondary col-1 ms-1" type="submit">REGISTRATI</button>
    </form>
@endsection