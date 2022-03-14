@extends('layouts.main-layout')
@section('content')
{{-- title grafico--}}
<h2 class="title-order">
    I 5 Piatti Piu' Venduti
</h2>

{{-- chart component --}}
<div>
    <chart-component></chart-component>
</div>

{{-- section order --}}
<section id="list-orders">

    {{-- title order --}}
    <h2 class="title-order">
        Lista Ordini
    </h2>

    {{-- container orders --}}
    <div id="orders">
        @foreach ($listOrders as $orders)
            @foreach ($orders as $order)
            <div class="order">

                {{-- headling order list --}}
                <div id="heading-order-list">
                    {{-- ceil --}}
                    <div class="ceil-headling">
                        Nome Piatto   
                    </div>
                    
                    {{-- ceil --}}
                    <div class="ceil-headling">
                        Categoria   
                    </div>
                    
                    {{-- ceil --}}
                    <div class="ceil-headling">
                        Quantita'    
                    </div>
                </div>
                {{-- /headling order list --}}
    
                @foreach ($order -> dishes as $dish)
                {{-- row order --}}
                <div class="product" >  
                    {{-- ceil --}}
                    <div class="ceil">
                        {{ $dish -> name }}    
                    </div>
                    
                    {{-- ceil --}}
                    <div class="ceil">
                        {{ $dish -> category }}    
                    </div>
                    
                    {{-- ceil --}}
                    <div class="ceil">
                        {{ $dish -> pivot -> quantity }}    
                    </div>
                </div>
                {{-- /row order --}}
    
                @endforeach
                {{-- footer list , prende il css dell'header-list--}}
                <div id="heading-order-list">
                    {{-- ceil --}}
                    <div class="ceil-headling">
                        Costo Ordine  
                    </div>
                    
                    {{-- ceil --}}
                    <div class="ceil-headling">
                          {{ $order -> order_price }}€
                    </div>
                </div>
                {{-- /footer list --}}
                
            </div>

            @endforeach
        @endforeach
    </div>
</section>
{{-- section order --}}

@endsection