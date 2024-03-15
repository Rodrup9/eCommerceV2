@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/navVendedor.css">
    <link rel="stylesheet" href="/css/PedidoDetalle.css">
    
@endsection




@section('subMenu')
    @include('layouts.subHeaderVendedor')
@endsection

@section('main')
    <div class="cont-detalles">
        <div class="Acciones">
            <h1>Nombre</h1>
            <a href="#"><span class="material-symbols-outlined iconDelete">delete</span></a>
        </div>
        <div class="Detalles">
            <h2>Detalles generales</h2>
        </div>
    </div>
@endsection