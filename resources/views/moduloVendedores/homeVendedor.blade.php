@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">
@endsection


@section('main')
<main class="mainAdminAdmin">
    <a href="{{route("vendedor.lista.productos")}}" class="cardMenuAdmin">
        <i class='bx bx-store-alt' ></i>
        <h2>Lista productos</h2>
    </a>
    <a href="{{route("vendedor.pedidos")}}" class="cardMenuAdmin">
        <i class='bx bx-group'></i>
        <h2>Lista pedidos</h2>
    </a>
    <a href="{{route("vendedor.producto")}}" class="cardMenuAdmin">
        <i class='bx bxs-report' ></i>
        <h2>Agregar Productos</h2>
    </a>
    <a href="{{route("vendedor.comentarios")}}" class="cardMenuAdmin">
        <i class='bx bx-package' ></i>
        <h2>Comentarios</h2>
    </a>
    <a href="{{route('vendedor.reporte')}}" class="cardMenuAdmin">
        <i class='bx bx-message-dots' ></i>
        <h2>Reportes</h2>
    </a>
    <a href="#" class="cardMenuAdmin">
        <i class='bx bx-user' ></i>
        <h2>Perfil</h2>
    </a>
</main>

@endsection



@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection