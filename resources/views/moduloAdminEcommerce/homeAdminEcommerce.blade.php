@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">
@endsection

@section('main')
    <main class="mainAdminAdmin">
        <a href="{{route('adminListaEcommerce','Vendedor')}}" class="cardMenuAdmin">
            <i class='bx bx-store-alt' ></i>
            <h2>Vendedores</h2>
        </a>
        <a href="{{route('adminListaEcommerce','Cliente')}}" class="cardMenuAdmin">
            <i class='bx bx-group'></i>
            <h2>Usuarios</h2>
        </a>
        
        <a href="{{route('adminEcommerce.productos.vendedor')}}" class="cardMenuAdmin">
            <i class='bx bx-package' ></i>
            <h2>Productos</h2>
        </a>
        
        <a href="{{route('perfil')}}" class="cardMenuAdmin">
            <i class='bx bx-user' ></i>
            <h2>Perfil</h2>
        </a>

        <a href="{{'vendedor'}}" class="cardMenuAdmin">
            <i class='bx bxs-report' ></i>
            <h2>Vendedor</h2>
        </a>

        <a href="{{'home'}}" class="cardMenuAdmin">
            <i class='bx bxs-report' ></i>
            <h2>Sitio web</h2>
        </a>
    </main>
@endsection

@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection