@extends('layouts.main-layout')
@section('content')
    {{-- chart component --}}
    <chart-component></chart-component>


    {{-- section order --}}
    <section id="list-orders">

        {{-- title order --}}
        <h2 class="title-order">
            Lista Ordini
        </h2>

        {{-- container orders --}}
        <div id="orders" class="row row-cols-md-2 row-cols-xl-3">
            @foreach ($listOrderComplete as $orders)
                <div class="order">
                    {{-- headling order list --}}
                    <div id="heading-order-list">
                        {{-- ceil --}}
                        <div class="ceil-headling align-middle">
                            Nome Piatto
                        </div>

                        {{-- ceil --}}
                        <div class="ceil-headling align-middle">
                            Categoria
                        </div>

                        {{-- ceil --}}
                        <div class="ceil-headling align-middle">
                            Quantita'
                        </div>
                    </div>
                    {{-- /headling order list --}}

                    @foreach ($orders['dishes'] as $dish)
                        {{-- row order --}}
                        <div class="product">
                            {{-- ceil --}}
                            <div class="ceil align-middle">
                                {{ $dish->name }}
                            </div>

                            {{-- ceil --}}
                            <div class="ceil align-middle">
                                {{ $dish->category }}
                            </div>

                            {{-- ceil --}}
                            <div class="ceil align-middle">
                                {{ $dish->pivot->quantity }}
                            </div>
                        </div>
                    @endforeach
                    {{-- /row order --}}

                    {{-- footer list , prende il css dell'header-list --}}
                    <div id="footer-order-list">
                        {{-- ceil --}}
                        <div class="ceil-footer align-middle">
                            Costo Ordine
                        </div>

                        {{-- ceil --}}
                        <div class="ceil-footer align-middle">
                            {{ $orders['order_price'] }}€
                        </div>
                    </div>
                    {{-- /footer list --}}
                </div>
            @endforeach
        </div>
    </section>
    {{-- section order --}}
@endsection
