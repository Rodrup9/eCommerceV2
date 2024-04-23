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
                            <input id="CountProductoCart" class="inputCantidad" type="number" name="number" value="1" max="{{$productoD['cantidad']}}" min="1">
                            <input id="idProducto" type="hidden" value="{{$productoD['producto_id']}}">
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
                            <button type="button" onclick="addCart(1)" class="btnText btnConfirm">Comprar Ahora</button>
                            <button type="button" onclick="addCart(0)" class="btnText btnCancel" >Agregar al carrito</button>
                            <a href="/shoppingCart" id="btnComprarAhora" class="btnHidden" type="submit"></a>
                            <input type="hidden" id="urlProductCart" name="url" value="{{$productoD['url']}}">
                            <input type="hidden" id="idProductoCart" name="id" value="{{$productoD['producto_id']}}">
                            <input type="hidden" id="NameProductoCart" name="nombre" value="{{$productoD['nombre']}}">
                            <input type="hidden" id="PriceProductoCart" name="precio" value="{{$productoD['precio']}}">
                        </div>
                    </div>
                    <div class="sourseDetalles">
                        <p>Califiación</p>  
                        <input id="vStarCal" type="hidden" value="{{$calidad[0]['media']}}">
                        <span id="vCal" class="calificacion">{{$calidad[0]['media']}}</span>
                        <div id="constBoxStar" class="">

                        </div>
                    </div>
                </form>
            </section>
            @if (count($productoD['urls']) != 0)
                <section class="imgBoxImgs">
                    <div class="tittleImg">
                        <h3>Imagenes</h3>
                        <div id="iconArrow">
                            <i class='bx bx-chevron-down' onclick="imgShowBox(0)"></i>
                        </div>
                    </div>
                    {{--<i class='bx bx-chevron-left arrowSliderD'></i>--}}
                    <div class="sliderImg">
                        <div class="boxSliderImg">
                            @foreach ($productoD['urls'] as $item)
                                <img class="imgSlider" src="{{$item}}" alt="" onclick="showImgBig('{{$item}}')">
                             @endforeach
                        </div>
                    </div>
                    {{--<i class='bx bx-chevron-right arrowSliderD'></i>--}}
                </section>
            @endif
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
            <div id="boxComentarios" class="comentariosShow">
                    {{--
                    <x-card-comentario>
                        <x-slot name="nameUser"></x-slot>
                        <x-slot name="scoreIcons"></x-slot>
                        <x-slot name="comentarioTetxt"></x-slot>
                    </x-card-comentario>
                    --}}
            </div>
            <div class="comentariosAdd">
                @guest
                    <h3>Iniciar sesión para añadir un comentario</h3>
                @else
                    <h3>Califica esté producto</h3>
                    <div id="starsContainer" class="scoreAdd">
                        <span class="start"><i id="star1" class='star bx bx-star' ></i></span>
                        <span class="start"><i id="star2" class='star bx bx-star' ></i></span>
                        <span class="start"><i id="star3" class='star bx bx-star' ></i></span>
                        <span class="start"><i id="star4" class='star bx bx-star' ></i></span>
                        <span class="start"><i id="star5" class='star bx bx-star' ></i></span>
                    </div>
                    <textarea class="writtingComentario" name="comentarioAdd" id="cAdd" cols="" rows="" placeholder="Escribe un comentario"></textarea>
                    <div class="btnEnviar">
                        <button id="btnComentario" onclick="addComentarioUser()" class="btnText btnConfirm" type="button">Enviar comentario</button>
                    </div>
                    <form action="addComentarioUser" method="post">
                        @csrf
                        <input id="prodcutoId" name="producto" type="hidden" value="{{$productoD['producto_id']}}">
                        {{--<input id="userId" name="user" type="hidden" value="{{$productoD['poducto_id']}}">--}}
                        <input id="comentarioText" name="comentarioText" type="hidden">
                        <input id="scoreAdd" name="scoreAdd" type="hidden" value="0">
                        <input id="idUser" name="idUser" type="hidden" value="{{$user['id']}}">
                        <input type="hidden" name="_token" value='@csrf' >
                        <button class="btnHidden" type="submit"></button>
                    </form>
                @endguest
                
            </div>
        </section>

    </div>

    <div id="imgBigAbsolute" class="imgBigAbsolute">
        <i class='bx bx-x closeImg' onclick="closeShowImgBig()"></i>
        <img id="imgBig" src="" alt="">
    </div>
@endsection

@section("footer")
    @include('layouts.footer')
@endsection

@section('jsPage')
    <script src="/js/moduloDetalles.js"></script>
    <script src="/js/ajaxComentarios.js"></script>
    <script src="/js/components.js"></script>
@endsection