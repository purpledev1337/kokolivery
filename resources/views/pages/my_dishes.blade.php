@extends('layouts.main-layout')
@section('content')
    <h2>Piatti:</h2>
    <a class="btn btn-primary" href="{{ route('dish.create') }}" >AGGIUNGI</a>
    <br>
    <br>
    @foreach ($dishes as $dish)
        @if (!$dish -> delete)
        <div>
            {{ $dish -> name }} 
            <span class="{{ $dish -> is_visible? 'visibility':'' }}">Non Visibile</span>
        </div>
        <a href="{{ route('dish.edit', $dish -> id) }}" class="btn btn-primary">MODIFICA</a>
        <a  href="#" 
            data-target-id="{{ $dish -> id }}" 
            data-bs-toggle="modal" 
            data-bs-target="#deleteDishConfirmation" 
            class="btn btn-danger">
            CANCELLA
        </a>
        <a href="{{ route('dish.visibility', $dish -> id) }}" class="btn btn-secondary">VISIBILITA</a>
        <br><br>
        @endif
    @endforeach

    {{-- modale alert delete --}}
    @include('pages.modal.delete-dish-confirmation')

@endsection