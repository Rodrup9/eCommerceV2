@extends('layouts.header')

{{-- Agreguen solo el archivo css del modulo en el que están --}}
{{-- El resto de estilos se encuentran en el archivo globales --}}
@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
@endsection

{{-- Agregar esta parte si necesitan el submenu --}}
@section('subMenu')
    @include('layouts.subHeader')
@endsection
{{--  --}}

{{-- Contenido de la pagina --}}
@section('main')
    @include('layouts.asideDes')
    {{--Si utilizan el menu desplegable recomiendo utilizar este divCenterMain--}}
    <div class="divCenterMain">
        <main class="boxOfertas">
            <div class="tittle"><p>Ofertas especiales</p> <a class="verMas" href="catalogo/ofertas">Ver más</a></div>
            <div class="boxSliderOfertas">
                <div class="boxBoxOfertas">
                    <div class="boxOfertaMain">
                        <a href="#" class="ofertaPanel oferta1">
                            <img src="https://picsum.photos/200/300" alt="">
                        </a>
                        <a href="#" class="ofertaPanel oferta2">
                            <img src="https://picsum.photos/200/300" alt="">
                        </a>
                        <a href="#" class="ofertaPanel oferta3">
                            <img src="https://picsum.photos/200/300" alt="">
                        </a>
                        <a href="#" class="ofertaPanel oferta4">
                            <img src="https://picsum.photos/200/300" alt="">
                        </a>
                        <a href="#" class="ofertaPanel oferta5">
                            <img src="https://picsum.photos/200/300" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </main>
    
    @foreach ($sectionS as $nameS => $data)
        <x-slider-product>
        @foreach ($products as $item)
            {{--Esta son las unicas variables que se deben enviar--}}
            <x-slot name="nameSectionSlider">{{$nameS}}</x-slot>
            <x-slot name="urlSectionSlider">{{$data['url']}}</x-slot>
            {{--Aqui termian las variables del slider lo demás es contenido--}}
            <x-card-product :img="$item['url']">
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