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
                <div class="boxSliderOfertas">
                    <div class="boxBoxOfertas">
                        <div class="boxOfertaMain">
                            <div class="ofertaCheckImg">
                                <img id="imgCheck" src="#" alt="producto">
                            </div>
                            <div class="ofertaCheckInfo">
                                <p id="nombreP"></p>
                                <p id="desP"></p>
                                <div class="infoButtom">
                                    <div id="nSubC" class="categoriaCard"></div>
                                    <div class="infoButtomOpen">
                                        <div class="numeros"><span id="ofertaP" class="ofertaPS"></span><span id="precioAnteP" class="precioAntePS"></span><span id="precioP" class="precioPS"></span></div>
                                        <a id="buttomP" class="btnConfirm btnText" href="">Ver producto</a>
                                    </div>        
                                </div>
                                <span class="anim"></span>
                            </div>
                            <div class="ofertasProductsNum">
                                @foreach ($ofertasEspeciales as $item)
                                    <div class="ofertaPanel">
                                        <img src="{{$item['url']}}" alt="" onclick="showOfert('{{$item["position"]}}')">
                                        <a  href="/detalles/{{$item['producto_id']}}/{{$item['nombre']}}" class="ofertaOptionExpandir2">
                                            <i class='bx bx-log-in-circle'></i>
                                        </a>
                                        <span class="{{$item['position']}}">
                                            <p class="nombreP">{{$item['nombre']}}</p>
                                            <p class="idP">{{$item['producto_id']}}</p>
                                            <p class="desP">{{$item['descripcion']}}</p>
                                            <p class="preP">{{$item['precio']}}</p>
                                            <p class="ofertaP">{{$item['oferta']}}</p>
                                            <p class="preAnteP">{{$item['precio_ante']}}</p>
                                            <p class="imgP">{{$item['url']}}</p>
                                            <p class="nombreSC">{{$item['nombreSubCategoria']}}</p>
                                        </span>
                                    </div>
                                @endforeach
                                <a href="catalogo/null/ofertas-especiales" class="ofertasProductsNumMas">
                                    <i class='bx bx-plus'></i>
                                    <div class="ofertaOptionExpandir">Ver más</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="errorTry">
                    <p>Ups! Parece que hubo un error</p>
                </div>
            @endif
        </main>
        {{--
        <section id="sectionRecientes" class="section sectionSlider">
            <div class="tittle"><p>Recientes</p></div>
            <div class="boxProductos">
                <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
                    <i class='bx bxs-chevron-left arrowIcon'></i>
                </div>
                <div id="sliderBox" class="sliderBox sliderProductos">
                    <div id="slider1" class="slider sliderBoxProductos">
                        
                    </div>
                </div>
                <div id="arrowSliderRight" class="arrowSliderRight arrow">
                    <i class='bx bxs-chevron-right arrowIcon'></i>
                </div>
            </div>
        </section>
        <section class="section sectionSlider">
            <div class="tittle"><p>Sugerencias</p> <a class="verMas" href="catalogo/null/sugerencias">Ver más</a></div>
            <div class="boxProductos">
                <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
                    <i class='bx bxs-chevron-left arrowIcon'></i>
                </div>
                <div id="sliderBox" class="sliderBox sliderProductos">
                    <div id="slider2" class="slider sliderBoxProductos">
                        
                    </div>
                </div>
                <div id="arrowSliderRight" class="arrowSliderRight arrow">
                    <i class='bx bxs-chevron-right arrowIcon'></i>
                </div>
            </div>
        </section>
        <section class="section sectionSlider">
            <div class="tittle"><p>Tendencias</p> <a class="verMas" href="catalogo/null/tendencias">Ver más</a></div>
            <div class="boxProductos">
                <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
                    <i class='bx bxs-chevron-left arrowIcon'></i>
                </div>
                <div id="sliderBox" class="sliderBox sliderProductos">
                    <div id="slider3" class="slider sliderBoxProductos">
                        
                    </div>
                </div>
                <div id="arrowSliderRight" class="arrowSliderRight arrow">
                    <i class='bx bxs-chevron-right arrowIcon'></i>
                </div>
            </div>
        </section>
        <section class="section sectionSlider">
            <div class="tittle"><p>Descuentos</p> <a class="verMas" href="catalogo/null/descuentos">Ver más</a></div>
            <div class="boxProductos">
                <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
                    <i class='bx bxs-chevron-left arrowIcon'></i>
                </div>
                <div id="sliderBox" class="sliderBox sliderProductos">
                    <div id="slider4" class="slider sliderBoxProductos">
                        
                    </div>
                </div>
                <div id="arrowSliderRight" class="arrowSliderRight arrow">
                    <i class='bx bxs-chevron-right arrowIcon'></i>
                </div>
            </div>
        </section>
        --}}
        @if (count($products) > 0)
            @foreach ($sectionS as $nameS => $data)
                <section class="sliderProductsSection">
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
                        <x-card-ver-mas-extra>
                            <x-slot name="urlSectionCard">{{$data['url']}}</x-slot>
                        </x-card-ver-mas-extra>
                    </x-slider-product>
                </section>
            @endforeach
        @else
            <div class="errorTry">
                <p>Parece que hubo un error</p>
            </div>
        @endif
    
    </div> 

@endsection

@section("footer")
    @include('layouts.footer')
@endsection

{{-- Agregar los js de su modulo --}}
@section('jsPage')
    <script src="/js/moduloInicio.js"></script>
    <script src="/js/components.js"></script>
    <script src="/js/ajaxHome.js"></script>
@endsection