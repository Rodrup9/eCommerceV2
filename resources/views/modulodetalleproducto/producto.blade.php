@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
    <link rel="stylesheet" href="/css/detalles.css">
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">  

@endsection


@section('main')
    <main class="cajita">
        <div class="container">
            <div class="Imgencita">
                <img src="{{$productoD['url']}}" alt="">
            </div>
            <div class="details">
                <h1>{{$productoD['nombre']}}</h1> <br>
                <h1 class="letra"></h1><br>
                <p>Tipo de envío</p>
                <p>Enviado Desde China</p>
                <p>{{$productoD['precio']}}</p>
                <p>{{$productoD['oferta']}}</p>
                <p>{{$productoD['precio_ante']}}</p>
                <p>Disponibles {{$productoD['cantidad']}}</p>
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
            <p>{{$productoD['descripcion']}}</p>
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