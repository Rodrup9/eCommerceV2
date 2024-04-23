@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloShoppingCart.css">
@endsection

@section('main')
    <main class="mainShoppingCart">
        <div  class="sectionShoppingCart">
            
            <div class="headerMain">
                <h1>Confirmación de datos</h1>
            </div>
            <section class="formConfirm"> 
                <div class="inputConfirm">
                    <label for="">Nombre completo</label>
                    <input type="text" placeholder="Nombre completo">
                </div>
                <div class="inputConfirm">
                    <label for="">Correo electronico</label>
                    <input type="text" placeholder="Correo">
                </div>
                <div class="inputConfirm">
                    <label for="">Destino del producto</label>
                    <input type="text" placeholder="Dirección">
                </div>
                <div class="inputConfirm">
                    <label for="">Codigo Postal</label>
                    <input type="text" placeholder="CP">
                </div>
                <div class="inputConfirm boxInput">
                    <label for="">Información de pago</label>
                    <input type="text" placeholder="Numero de Tarjeta">
                    <div class="cvInpt">
                        <label for="">Clave</label>
                        <input type="number" placeholder="CVV" min="0" lang="3">
                    </div>
                    <input type="hidden">
                    
                </div>
            </section>
            <div class="buttonCart">
                <a href="{{route('homeShoppingCart')}}" class="btnText btnCancel">Regresar</a>
                <button type="button" onclick="payPay()" class="btnText btnConfirm">Confirmar compra</button>
            </div>
        </div>
            
        <form method="post" action="{{route('pay')}}">
            @csrf
            @foreach ($show as $item)
                <input class="inValue" name="{{$item->id}}" type="hidden" value="{{$item->cantidad}}">
                <button id="paying" type="submit" class="btnHidden">Confirmar compra</button>
            @endforeach
        </form>
    </main>

@endsection

@section('jsPage')
    <script src="/js/moduloShoppingCart.js"></script>
@endsection