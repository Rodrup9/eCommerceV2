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
        <main class="boxOfertas">
            <div class="tittle"><p>Ofertas especiales</p> <a class="verMas" href="catalogo/null/ofertasEspeciales">Ver más</a></div>
            <div class="boxSliderOfertas">
                <div class="boxBoxOfertas">
                    <div class="boxOfertaMain">
                        <a href="/detalles/{{$ofertasEspeciales[0]['producto_id']}}/{{$ofertasEspeciales[0]['nombre']}}" class="ofertaPanel oferta1">
                            <img src="{{$ofertasEspeciales[0]['url']}}" alt="">
                        </a>
                        <a href="/detalles/{{$ofertasEspeciales[1]['producto_id']}}/{{$ofertasEspeciales[1]['nombre']}}" class="ofertaPanel oferta2">
                            <img src="{{$ofertasEspeciales[1]['url']}}" alt="">
                        </a>
                        <a href="/detalles/{{$ofertasEspeciales[2]['producto_id']}}/{{$ofertasEspeciales[2]['nombre']}}" class="ofertaPanel oferta3">
                            <img src="{{$ofertasEspeciales[2]['url']}}" alt="">
                        </a>
                        <a href="/detalles/{{$ofertasEspeciales[3]['producto_id']}}/{{$ofertasEspeciales[3]['nombre']}}" class="ofertaPanel oferta4">
                            <img src="{{$ofertasEspeciales[3]['url']}}" alt="">
                        </a>
                        <a href="/detalles/{{$ofertasEspeciales[4]['producto_id']}}/{{$ofertasEspeciales[4]['nombre']}}" class="ofertaPanel oferta5">
                            <img src="{{$ofertasEspeciales[4]['url']}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </main>
    
    @foreach ($sectionS as $nameS => $data)
        <x-slider-product>
        @foreach ($products as $item)
            <x-slot name="nameSectionSlider">{{$nameS}}</x-slot>
            <x-slot name="urlSectionSlider">{{$data['url']}}</x-slot>
            <x-card-product :img="$item['url']">
                <x-slot name="id">{{$item['producto_id']}}</x-slot>
                <x-slot name="producto">{{$item['nombre']}}</x-slot>
                <x-slot name="tag">{{$item['oferta']}}</x-slot>
                <x-slot name="descuento">{{$item['oferta']}}</x-slot>
                <x-slot name="precio">{{$item['precio']}}</x-slot>
                {{$item['descripcion']}}
            </x-card-product>
        @endforeach
        </x-slider-product>
    @endforeach 
    </div> 

    <footer>
        
    </footer>
@endsection

{{-- Agregar los js de su modulo --}}
@section('jsPage')
    <script src="/js/moduloInicio.js"></script>
    <script src="/js/components.js"></script>
@endsection