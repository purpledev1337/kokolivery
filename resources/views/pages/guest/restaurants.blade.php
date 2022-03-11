@extends('layouts.main-layout')

@section('content')

<div>

    <restaurants-component city="{{$city ?? ''}}"></restaurants-component>
    

</div>
    
@endsection