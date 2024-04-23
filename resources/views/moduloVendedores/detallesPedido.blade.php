@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/navVendedor.css">
    <link rel="stylesheet" href="/css/PedidoDetalle.css">
    
@endsection



@section('main')
    <main class="detalles-pedido">
        <h1>Detalles Del Pedido</h1>
        <div class="detalles-generales">
            <div class="datos-user">
                <h2>Datos del cliente</h2>
                <p>Nombre: </p>
                <p>{{$pedido->user->nombre}}</p>
                <p>Apellido Paterno: </p>
                <p>{{$pedido->user->apellido_pa}}</p>
                <p>Apellido materno: </p>
                {{$pedido->user->apellido_ma}}
                <p>Correo electronico:</p>
                <p>{{$pedido->user->email}}</p>
                <p>Ubicación:</p>
                <p>{{$pedido->ubicacion->direccion}}</p>
            </div>
    
            <div class="datos-pedido">
                <h2>Datos del pedido:</h2>
                <p>Fecha de la compra del pedido: </p>
                <p>{{$pedido->fecha_de_pedido}}</p>
                <p>Fecha Estimada de llegada: </p>
                <p>{{$pedido->fecha_de_entrega}}</p>
                <p>Estatus del pedido:</p>
                <p>{{$pedido->estado_pedido->nombre}}</p>
                <p>Tipo de entrega:</p>
                <p>{{$pedido->tipo_de_entrega->nombre}}</p>
            </div>
        </div>
        
        <h2>LIsta de productos:</h2>
        <div class="datos-productos">
            
            @foreach ($pedido->detalle_de_pedido->productos as $producto)
                <div class="img-prd">
                    @foreach($producto->images as $img)
                    <img src="{{$img->url}}" alt="">
                    @endforeach
                    
                </div>
                <div class="txt-prd">
                    <h2>Datos de los articulos</h2>
                    <p>Nombre: {{$producto->nombre}}</p>
                    <P>Descripción: {{$producto->descripcion}}</P>
                    <p>Precio: {{$producto->precio}}</p>
                    <p>Categoria:</p>
                    <p>Subcategoria:</p>
                    <p>Cantidad: {{$pedido->detalle_de_pedido->cantidad}}</p>
                </div>    
            @endforeach
            
            

            
        </div>
    </main>
@endsection