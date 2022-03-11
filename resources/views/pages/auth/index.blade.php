@extends('layouts.main-layout')
@section('content')
<my-component
    labels="{{ json_encode(['2014', '2015', '2016', '2017', '2020']) }}"
    data-prop="{{ json_encode(['99', '66', '87', '49', '92']) }}">
</my-component>
@endsection