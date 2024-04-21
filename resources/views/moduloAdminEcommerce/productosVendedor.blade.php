@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">
@endsection

@section('subMenu')
    @include('layouts.subHeader')
@endsection

@section('main')

    @foreach ($productos as $producto)
        <p>{{$producto}}</p>
    @endforeach
    
@endsection