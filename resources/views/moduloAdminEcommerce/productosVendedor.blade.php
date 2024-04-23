@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">
    <link rel="stylesheet" href="/css/listaProducto.css">
@endsection

@section('subMenu')
    @include('layouts.subHeader')
@endsection

@section('main')
<main class="lista-pedidos">
    <h1 class="txt-aling">Productos Registrados:</h1>
    <div class="pedido">
        <p class="item-pedido">Nombre del Vendedor</p>
        <p class="item-pedido">Correo:</p>
        <p class="item-pedido">N° Productos Agregados</p>
    </div>

    @foreach ($productos as $producto)
    <a href="{{route('adminEcommerce.productos.vendedor.detalles',$producto->id)}}">
        <div class="pedido color">
            <p class="item-pedido">{{$producto->nombre}} {{$producto->apellido_pa}} {{$producto->apellido_ma}}</p>
            <p>{{$producto->email}}</p>
            <p class="item-pedido">{{$producto->productos_count}}</p>
    
        </div>

    </a>
    
    @endforeach
@endsection