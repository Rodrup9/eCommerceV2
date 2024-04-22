@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/navVendedor.css">
    <link rel="stylesheet" href="/css/PedidoDetalle.css">
    
@endsection



@section('main')
    <main class="detalles-pedido">
        <div class="datos-user">
            <h1>Datos del cliente:</h1>
            <p>Nombre: </p>
            <p>Apellido Paterno:</p>
            <p>Apellido materno:</p>
            <p>Correo electronico:</p>
        </div>

        <div class="datos-pedido">
            <h2>Datos del pedido:</h2>
            <p>Fecha de la compra del pedido: </p>
            <p>Fecha Estimada de llegada: </p>
        </div>

        <div class="datos-productos">
            <div class="img-prd">
                <img src="" alt="">
            </div>
            <div class="txt-prd">
                <h2>Datos de los articulos:</h2>
                <p>Nombre:</p>
                <P>Descripción:</P>
                <p>Precio:</p>
                <p>Categoria:</p>
                <p>Subcategoria:</p>
                <p>Cantidad: </p>
            </div>
            
            

            
        </div>
    </main>
@endsection