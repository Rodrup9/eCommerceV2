@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloShoppingCart.css">
@endsection

@section('main')
    <main class="mainShoppingCart">
        {{--@if ($user != null and $cart != null)--}}
        @guest
            <div class="noCart">
                <h2>Inicia sesión para añadir productos a tú carrito de compras</h2>
            </div>
        @else
            <form method="post" action="{{route('confirmData')}}" class="sectionShoppingCart">
                @csrf 
                <div class="headerMain">
                    <h1>Tú carrito de compras</h1>
                </div>
                <section id="productsCart" class="productsCart"> 
                    
                </section>
                <p class="fraseFooter">Selecciona los productos que desees comprar</p>
                <div class="buttonCart">
                    <a href="#" class="btnText btnCancel">Cancelar</a>
                    <button type="button" onclick="pagar()" class="btnText btnConfirm">Pagar</button>
                    <input id="data" type="hidden" value="" name="data">
                    <button type="submit" class="btnHidden" id="goPay">Pagar</button>
                </div>
                {{-- <a " class="buttonRegresar">{{$urlPage}}</a> --}}
            </form>
        @endguest
        {{--
        @elseif ($user != null)
            <div class="sinProductos sin">
                <h2>Añade productos a tu carrito de compras</h2>
                <img src="/svg/empty.svg" alt="">
                <a class="btnText btnNeutro" href="/catalogo/explorar">Explorar</a>
            </div>
        @else
            <div class="sinSesion sin">
                <h2>Inicia sesión para ver tus productos</h2>
                <img src="/svg/shopping-cart.svg" alt="">
                <div class="buttonCart">
                    <a class="btnText btnNeutro" href="#">Iniciar sesión</a>
                    <a class="btnText btnNeutro" href="#">Crear cuenta</a>
                </div>
            </div>
        @endif
        --}}
        <div>
            
        </div>
    </main>

@endsection

@section('jsPage')
    <script src="/js/moduloShoppingCart.js"></script>
@endsection