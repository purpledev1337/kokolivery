
@extends('layouts.main-layout')
@section('content')
    <form class="row g-3 container m-auto"
          method="POST"
          action="{{ route('register') }}"
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
            <label for="brand_name" class="form-label">Brand Name</label>
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
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        {{-- address --}}
        <div class="col-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control">
        </div>

        {{-- city --}}
        <div class="col-6">
            <label for="city" class="form-label">City</label><br>
            <select class="form-select form-control" name="city" aria-label="Default select example">
                <option selected>Open this select menu</option>
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
            <label for="order_min" class="form-label">Order Min</label>
            <input type="number" name="order_min" class="form-control">
        </div>

        {{-- Delivery price --}}
        <div class="col-4">
            <label for="delivery_price" class="form-label">Delivery Price</label>
            <input type="number" name="delivery_price" class="form-control">
        </div>
        
        {{-- discount --}}
        <div class="col-4">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" name="discount" class="form-control">
        </div> 
        
        {{-- descrizione --}}
        <div class="offset-3 col-6">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
        </div>

        <a href="{{ route('home') }}" class="btn btn-danger offset-5 col-1 me-1" type="submit" >CANCEL</a>
        <button class="btn btn-secondary col-1 ms-1" type="submit">REGISTER</button>
    </form>
@endsection