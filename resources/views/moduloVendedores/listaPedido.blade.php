@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/listaPedido.css">
@endsection


@section('main')
<main class="lista-pedidos">
    <h1>Lista de pedidos realizados:</h1>
    @forelse ($pedidos as $pedido)
        <a href="{{route("vendedor.pedidos.detalles",$pedido->pedido_id)}}" class="pedido quitar">
            <div class="img-pedidos">
                <p>Fecha del pedido: {{$pedido->fecha_de_pedido}}</p>
                @foreach ($pedido->detalle_de_pedido->productos as $producto)
                    @foreach ($producto->images as $pro)
                        <img src="{{$pro->url}}" alt="">
                        <img src="/img/user.png" alt="">    
                    @endforeach
                @endforeach
                
            </div>
            <div class="info-pedido">
                <p>Comprado por :</p>
                <p class="">{{$pedido->user->nombre_de_usuario}}</p>
                <p class="">{{$pedido->user->nombre}} {{$pedido->user->apellido_pa}}  {{$pedido->user->apellido_ma}}</p>
                <p>Estado del pedido:</p>
                <span class="material-symbols-outlined">timer</span>
            </div>
        </a>
    @empty    
    @endforelse
    

</main>
@endsection