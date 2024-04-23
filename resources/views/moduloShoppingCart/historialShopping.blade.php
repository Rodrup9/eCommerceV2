@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloShoppingCart.css">
@endsection

@section('subMenu')
    @include('layouts.subHeader')
@endsection

@section('main')
    @include('layouts.asideDes')
    <main class="mainHistorial">
        <div class="liTitle">
            <div class="ctitle tLista"> <h2>Lista de compras</h2> </div>
            <div class="ctitle tFecha"> <h3>Fecha de compra</h3> </div>
            <div class="ctitle tStatus"> <h3>Estatus</h3> </div>
        </div>
        @foreach ($pedidos as $item)
            <div class="liProduct"> 
                <div class="ctitle lProducto"> <p>{{$item->pedido_id}}</p> </div>
                <div class="ctitle lDescripcion"> <p>{{$item->descripcion}}</p> </div>
                <div class="ctitle lFecha"> <p>{{$item->fecha_de_pedido}}</p> </div>
                <div class="ctitle lStatus"> <i class='bx bx-timer'></i> </div>
            </div>
        @endforeach
    </main>
    {{-- <div class="boxFinished">
        <h2 hidden class="mensajeFinished">{{$messegeStatus}}</h2>
    </div> --}}
@endsection

@section('jsPage')
    <script src="/js/moduloShoppingCart.js"></script>
@endsection