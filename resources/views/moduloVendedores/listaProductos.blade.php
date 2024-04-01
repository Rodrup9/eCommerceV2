@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/listaPedido.css">
    <link rel="stylesheet" href="/css/navVendedor.css">
@endsection




@section('main')
<main class="lista-pedidos">

    @foreach ($productos as $producto)
    <div class="pedido">
        <a href="{{route("vendedor.producto.detalle",$producto->producto_id)}}">{{$producto->nombre}}</a>
        <p class="">{{$producto->descripcion}}</p>
        {{-- <a href="{{route("vendedor.delete.producto",$producto->producto_id)}}"><span class="material-symbols-outlined">delete</span></a>
        <span class="material-symbols-outlined">update</span> --}}
    </div>    
    @endforeach
    
</main>
@endsection
