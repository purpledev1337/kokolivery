@extends('layouts.main-layout')
@section('content')
    <h2>Piatti:</h2>
    <br>
    <br>
    @foreach ($dishes as $dish)
        {{ $dish -> name }} <br>
    @endforeach
@endsection