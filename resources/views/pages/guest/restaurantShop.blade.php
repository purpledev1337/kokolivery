@extends('layouts.main-layout')

@section('content')

<div>

    <restaurant-shop-component route="{{ route("stripe.view") }}"></restaurant-shop-component>

</div>
    
@endsection