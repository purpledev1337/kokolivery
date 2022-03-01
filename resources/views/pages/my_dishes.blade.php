@extends('layouts.main-layout')
@section('content')
    <h2>Piatti:</h2>
    <a class="btn btn-primary" href="{{ route('dish.create') }}" >ADD</a>
    <br>
    <br>
    @foreach ($dishes as $dish)
        @if ($dish -> is_visible)
        <div>
            {{ $dish -> name }} 
        </div>
        <a href="{{  route('dish.edit', $dish -> id)}}" class="btn btn-primary">EDIT</a>
        <a href="{{ route('dish.delete', $dish -> id) }}" class="btn btn-danger">DELETE</a>
        <br><br>
        @endif
    @endforeach
@endsection