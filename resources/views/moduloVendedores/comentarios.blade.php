@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
    <link rel="stylesheet" href="/css/comentarios.css">
@endsection


@section('main')

<div class="">
    <h1>Comentarios de los productos</h1>
</div>


<div class="container-prod-coments">
    @forelse ($totalComn as $comn)
        <a href="{{route('vendedor.comentarios.count',$comn->producto_id)}}" class="card producto">
            <div class="imgProducto">
                <img src="/img/user.png" alt="">
            </div>
            <div class="detalles">
                <div class="moreDetalles">
                    <div class="tag">
                        <p>N° Comentarios: {{$comn->comentarios_count}}</p>
                    </div>
                </div>
                <div class="priceDes">
                <p class="nameProduct">Nombre: {{$comn->nombre}}</p>
                </div>
                <p class="precio"> Precio: {{$comn->precio}}</p>
                <p class="nameProduct">Decripcion:</p>
                <p class="descripcion">{{$comn->descripcion}}</p>
                
            </div>
        </a>
    @empty
        <p>No se registrado ningun comentario en el producto</p>
    @endforelse
    
    
    

</div>



@endsection

@section('jsPage')
    <script src="/js/comentarios.js"></script>
@endsection