@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/listaProducto.css">
    <link rel="stylesheet" href="/css/navVendedor.css">
@endsection




@section('main')
<main class="lista-pedidos">
    <h1 class="txt-aling">Productos Agregados</h1>
    <div class="pedido">
        <p class="item-pedido">Nombre</p>
        <p class="item-pedido">Fecha de publicación</p>
        <p class="item-pedido">Detalles</p>
    </div>

    @foreach ($productos as $producto)
    <div class="pedido color">
        <p class="item-pedido">{{$producto->nombre}}</p>
        <p class="item-pedido">{{$producto->created_at}}</p>
        {{-- <div class="item-pedido">
            <a class="ver-mas" href="{{route("vendedor.producto.detalle",$producto->producto_id)}}">ver detalles</a>
        </div> --}}

        <a class="item-pedido ver-mas" href="{{route("vendedor.producto.detalle",$producto->producto_id)}}">ver detalles</a>
        
    </div>    
    @endforeach
    
</main>
@endsection
