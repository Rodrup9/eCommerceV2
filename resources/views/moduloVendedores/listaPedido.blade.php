@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/listaPedido.css">
    <link rel="stylesheet" href="/css/navVendedor.css">
@endsection

@section('subMenu')
    @include('layouts.subHeaderVendedor')
@endsection

@section('main')
<main class="lista-pedidos">
    <div class="pedido">
        <a href="{{route("vendedor.pedidos.detalles")}}">Nombre</a>
        <p class="">Producto</p>
        <p class="">Descripción</p>
        <p class="">Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>

    <div class="pedido">
        <a href="">Nombre</a>
        <p class="">Producto</p>
        <p class="">Descripción</p>
        <p class="">Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>

    <div class="pedido">
        <a href="">Nombre</a>
        <p class="">Producto</p>
        <p class="">Descripción</p>
        <p class="">Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>

    <div class="pedido">
        <a href="">Nombre</a>
        <p class="">Producto</p>
        <p class="">Descripción</p>
        <p class="">Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>

    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>
    <div class="pedido">
        <a href="">Nombre</a>
        <p>Producto</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <span class="material-symbols-outlined">timer</span>
    </div>

</main>
@endsection