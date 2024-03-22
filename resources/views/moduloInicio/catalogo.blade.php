@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
@endsection


@section('subMenu')
    @include('layouts.subHeader')
@endsection

@section('main')
    @include('layouts.asideDes')
    <div class="divCenterMain">
        <main class="mainCatalogo">
            <section class="boxProductosCatalogo">
                @foreach ($consulta as $item)
                    <x-card-product :img="$item['url']">
                        <x-slot name="id">{{$item['producto_id']}}</x-slot>
                        <x-slot name="producto">{{$item['nombre']}}</x-slot>
                        <x-slot name="tag">{{$item['oferta']}}</x-slot>
                        <x-slot name="descuento">{{$item['oferta']}}</x-slot>
                        <x-slot name="precio">{{$item['precio']}}</x-slot>
                        {{$item['descripcion']}}
                    </x-card-product>
                @endforeach
            </section>
        </main>
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloInicio.js"></script>
@endsection