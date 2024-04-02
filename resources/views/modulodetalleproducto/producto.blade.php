@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
    <link rel="stylesheet" href="/css/detalles.css">
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">  

@endsection


@section('main')
    <div>
        <main class="boxDetalleProducts">
            <section class="contentDetallesProduct">
                @if (false)
                    <img src="{{$productoD['url']}}" alt="" class="imgProducto"
                @endif
                <form method="post" action="#" class="contentDetallesDetalles">
                    @csrf
                    <div class="imgProducto">
                        <img src="{{$productoD['url']}}" alt="">
                    </div>
                    <div class="details">
                        <h1>{{$productoD['nombre']}}</h1>
                        <p>Dirección: <span>{{$productoD['direccion']}}</span></p>
                        <p>Vendido por <span>{{$productoD['user_id']}}</span></p>
                        <div class="boxInputCantidad">
                            <label for="">Cantidad</label>
                            <input class="inputCantidad" type="number" name="number" value="1" max="{{$productoD['cantidad']}}" min="1">
                            <input type="hidden" value="{{$productoD['producto_id']}}">
                        </div>
                        <div class="boxInputEnvio">
                            <label for="">Envio</label>
                            <select name="" id="">
                                @if('ambos' == $productoD['tipo_envio'])
                                    <option value="">Envio a domicilio</option>
                                    <option value="">Regojer</option>
                                @elseif($productoD['tipo_envio'] == 'recoguer')
                                    <option value="">Regojer</option>
                                @elseif($productoD['tipo_envio'] == 'envio')
                                    <option value="">Envio a domicilio</option>
                                @else
        
                                @endif
                            </select>
                        </div>
                        <div>
                            @if($productoD['oferta'] > 0)
                                <p><span>{{$productoD['oferta']}}</span>%</p>
                                <p>$<span>{{$productoD['precio_ante']}}</span></p>
                            @endif
                            <p>$<span>{{$productoD['precio']}}</span></p>
                        </div>
                        <div class="boxButtons">
                            <button type="submit" class="btnText btnConfirm">Comprar Ahora</button>
                            <button type="button" onclick="addCart()" class="btnText btnCancel" >Agregar al carrito</button>
                        </div>
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
                </form>
            </section>
            <section class="descripcionProductosDetalles">
                <h2>Descripción del Articulo</h2>
                <p>{{$productoD['descripcion']}}</p>
            </section>
        
        </main>
        
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
        <section class="comentariosAddShow">
            <div class="comentariosShow">
                @if (false)
                    <h2>Comentarios</h2>
                    <x-card-comentario>
                        <x-slot name="nameUser"></x-slot>
                        <x-slot name="scoreIcons"></x-slot>
                        <x-slot name="comentarioTetxt"></x-slot>
                    </x-card-comentario>
                @else
                    <div class="sinComentarios">
                        <h3>No hay comentarios para esté producto</h3>
                        <p>Se el primero en calificar este producto</p>
                    </div>
                @endif
            </div>
            <div class="comentariosAdd">
                <h3>Califica esté producto</h3>
                <div class="scoreAdd">
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                </div>
                <textarea class="writtingComentario" name="comentarioAdd" id="cAdd" cols="" rows="" placeholder="Escribe un comentario"></textarea>
                <div class="btnEnviar">
                    <button onclick="setComentario()" class="btnText btnConfirm" type="button">Enviar comentario</button>
                </div>
                <form action="addComentarioUser" method="post">
                    @csrf
                    <input id="comentarioText" name="comentarioText" type="hidden">
                    <input id="scoreAdd" name="scoreAdd" type="hidden">
                    <button class="btnHidden" type="submit"></button>
                </form>
            </div>
        </section>

    </div>
@endsection

@section("footer")
    @include('layouts.footer')
@endsection