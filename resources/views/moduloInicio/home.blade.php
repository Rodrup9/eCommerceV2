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
            @if (count($ofertasEspeciales) > 0)
                <div class="tittle"><p>Ofertas especiales</p> <a class="verMas" href="catalogo/null/ofertasEspeciales">Ver más</a></div>
                <div class="boxSliderOfertas">
                    <div class="boxBoxOfertas">
                        <div class="boxOfertaMain">
                            @foreach ($ofertasEspeciales as $item)
                                <a href="/detalles/{{$item['producto_id']}}/{{$item['nombre']}}" class="ofertaPanel {{$item['position']}}">
                                    <img src="{{$item['url']}}" alt="">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <p>Parace que ocurrio un error</p>
            @endif
        </main>
    @if (count($products) > 0)
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
    @else
        <p>Parece que hubo un error</p>
    @endif
    </div> 

    <footer>
        
    </footer>
@endsection

{{-- Agregar los js de su modulo --}}
@section('jsPage')
    <script src="/js/moduloInicio.js"></script>
    <script src="/js/components.js"></script>
@endsection