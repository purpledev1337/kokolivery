@extends('layouts.main-layout')

@section('content')

<div>

    <restaurant-shop-component route="{{ route("stripe.view", ['totale'=> 'ciao']) }}"></restaurant-shop-component>

</div>
    
@endsection