@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
    <link rel="stylesheet" href="/css/detalles.css">
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">  

@endsection


@section('main')
    <main class="boxDetalleProducts">
        <div class="contentDetallesProduct">
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
        </div>
    </main>
@endsection