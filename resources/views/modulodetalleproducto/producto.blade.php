@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
    <link rel="stylesheet" href="/css/detalles.css">
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">  

@endsection


@section('main')
{{--Si utilizan el menu desplegable recomiendo utilizar este divCenterMain--}}
    <main class="cajita">
        <div class="container">
            <div class="Imgencita">
                <img src="https://picsum.photos/200/300" alt="">
            </div>
            <div class="details">
                <h1>Mouse Logitech Mx Master 3s Inalámbrico Distancia 10 M Color Grafito</h1> <br>
                <h1 class="letra">${{ $products['product']['descuento'] }}</h1><br>
                <p>Tipo de envío</p>
                <p>Enviado Desde China</p>
                <p>Disponibles 4</p>
                <p>visita la Tienda de Ddtech</p>
                <a class="btnText btnConfirm" href="">Comprar Ahora</a>
                <a class="btnText btnCancel" href="">Agregar al carrito</a>
            </div>
            <div class="sourseDetalles">
                <p>Califiación</p>
                <span class="calificacion">75%</span>
                <div class="">
                    <span class="start"><i class='bx bxs-star' ></i></span>
                    <span class="start"><i class='bx bxs-star' ></i></span>
                    <span class="start"><i class='bx bxs-star' ></i></span>
                    <span class="start"><i class='bx bx-star' ></i></span>
                    <span class="start"><i class='bx bx-star' ></i></span>
                </div>
            </div>
        </div>
        <div class="contenedor-details">
            <h1>Detalles</h1>
            <p>Este es MX Master 3S, un emblemático mouse remasterizado.
                Siente cada momento de tu flujo de trabajo con más precisión, sensación táctil y desempeño, gracias a los clicks discretos y un sensor de seguimiento sobre cristal Grosor mínimo del cristal: 4 mm. de 8.000 dpi.
                Con clicks discretos: crea y haz todo tipo de cosas con la misma sensación de click, pero con menos ruido. Los clicks discretos ofrecen una sensación táctil satisfactoria y producen un 90% menos de ruido.
                Y si a eso se añade un botón rueda de desplazamiento electromagnético MagSpeed sumamente discreto, se obtiene una experiencia de alto desempeño sin distracciones.
                MX Master 3S funciona hasta 70 días con una carga completa, y permite tres horas de uso con un minuto de carga rápida.</p>
        </div>
        <div class="contenedor-tecnicos">
            <h1>Detalles Tecnicos</h1>
            <H2>MARCA: DIERYA</H2>
            <H2>MATERIAL: Fierro viejo</H2>
            <H2>BOTONES: 7</H2>
            <H2>CONECTIVIDAD: Inalambrico</H2>
            <H2>Uso sugerido: Jugar</H2>
        </div>
    @foreach ($sectionS as $nameS => $data)
        {{-- x-slider-product es como se llama al componente del slider, solo hay que pasar 3 parametros, 
            nombre de la seccion que se pone como $nameS, la url para ver mas hacer de esa seccion que se declara con $urlS
            y el contenido que se pone sin más dentro de la etiqueta--}}
        <x-slider-product>
            
            {{--Esta son las unicas variables que se deben enviar--}}
            <x-slot name="nameSectionSlider">{{$nameS}}</x-slot>
            <x-slot name="urlSectionSlider">{{$data['url']}}</x-slot>
            {{--Aqui termian las variables del slider lo demás es contenido--}}
            <x-card-product :img="$products['product']['img']">
                <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                {{$products['product']['description']}}
            </x-card-product>
            <x-card-product :img="$products['product']['img']">
                <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                {{$products['product']['description']}}
            </x-card-product>
            <x-card-product :img="$products['product']['img']">
                <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                {{$products['product']['description']}}
            </x-card-product>
            <x-card-product :img="$products['product']['img']">
                <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                {{$products['product']['description']}}
            </x-card-product>
            <x-card-product :img="$products['product']['img']">
                <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                {{$products['product']['description']}}
            </x-card-product>
            <x-card-product :img="$products['product']['img']">
                <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                {{$products['product']['description']}}
            </x-card-product>
        </x-slider-product>
    @endforeach 
    @foreach ($sectiosur as $nameS => $data)
    {{-- x-slider-product es como se llama al componente del slider, solo hay que pasar 3 parametros, 
        nombre de la seccion que se pone como $nameS, la url para ver mas hacer de esa seccion que se declara con $urlS
        y el contenido que se pone sin más dentro de la etiqueta--}}
    <x-slider-product>
        
        {{--Esta son las unicas variables que se deben enviar--}}
        <x-slot name="nameSectionSlider">{{$nameS}}</x-slot>
        <x-slot name="urlSectionSlider">{{$data['url']}}</x-slot>
        {{--Aqui termian las variables del slider lo demás es contenido--}}
        <x-card-product :img="$products['product']['img']">
            <x-slot name="producto">{{$products['product']['name']}}</x-slot>
            <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
            <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
            <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
            {{$products['product']['description']}}
        </x-card-product>
        <x-card-product :img="$products['product']['img']">
            <x-slot name="producto">{{$products['product']['name']}}</x-slot>
            <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
            <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
            <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
            {{$products['product']['description']}}
        </x-card-product>
        <x-card-product :img="$products['product']['img']">
            <x-slot name="producto">{{$products['product']['name']}}</x-slot>
            <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
            <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
            <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
            {{$products['product']['description']}}
        </x-card-product>
        <x-card-product :img="$products['product']['img']">
            <x-slot name="producto">{{$products['product']['name']}}</x-slot>
            <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
            <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
            <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
            {{$products['product']['description']}}
        </x-card-product>
        <x-card-product :img="$products['product']['img']">
            <x-slot name="producto">{{$products['product']['name']}}</x-slot>
            <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
            <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
            <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
            {{$products['product']['description']}}
        </x-card-product>
        <x-card-product :img="$products['product']['img']">
            <x-slot name="producto">{{$products['product']['name']}}</x-slot>
            <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
            <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
            <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
            {{$products['product']['description']}}
        </x-card-product>
    </x-slider-product>
@endforeach 
<div class="section-coco">
    <div class="contenedor-coments">
    <h1>Comentarios</h1>
    <h2>Username</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde quas delectus quisquam,
        ab sequi reprehenderit voluptatum modi aspernatur, odio amet maxime facilis inventore
        atque! Dolore modi vel quaerat consequatur hic.</p>
    <h2>Username</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde quas delectus quisquam,
        ab sequi reprehenderit voluptatum modi aspernatur, odio amet maxime facilis inventore
        atque! Dolore modi vel quaerat consequatur hic.</p>
    <h2>Username</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde quas delectus quisquam,
        ab sequi reprehenderit voluptatum modi aspernatur, odio amet maxime facilis inventore
        atque! Dolore modi vel quaerat consequatur hic.</p>
    </div>
    <div class="contenedor-addcoments">
        <form>
            <label for="texto">CALIFICA TU PRODUCTO:</label><br>
            <input type="text" id="texto" name="texto"><br>
            <input class="btnText btnConfirm" type="submit" value="Enviar Calificacion">
            
        </form>
    </div>
</div>
    


    </main> 

    <footer>
        
    </footer>
@endsection
@section('jsPage')
    <script src="/js/components.js"></script>
@endsection