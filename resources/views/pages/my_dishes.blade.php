@extends('layouts.main-layout')
@section('content')
    <h2>Piatti:</h2>
    <a class="btn btn-primary" href="{{ route('dish.create') }}" >ADD</a>
    <br>
    <br>
    @foreach ($dishes as $dish)
    <div>
        {{ $dish -> name }} 
    </div>
    <button class="btn btn-primary">EDIT</button>
    <button class="btn btn-danger">DELETE</button>
    <br><br>
    @endforeach
@endsection