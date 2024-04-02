@extends('sesion.layouts.mainSesion')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/mainCuenta.css">
@endsection

@section('main')
    <div class="container-center">
        <div class="center-elements">
            <h1>Recuperación de cuenta</h1>
            <p class="descripcion">Te enviaremos un codigo de recuperación para tú contraseña</p>
            <form action="{{route('sendCode')}}" method="GET">
                @csrf
                <fieldset>
                    <label for="">Correo electrónico</label>
                    <input type="email" name="email" value="{{old('email')}}">
                    @foreach ($errors->all() as $item)
                        <span class="alert">*{{$item}}</span>
                        <br>
                    @endforeach
                </fieldset>
                <button class="submit" type="submit">Enviar código</button>
            </form>
            <p><a href="{{route('verificacion')}}">¿Ya cuentas con un código?</a></p>
            <p class="regresar"><a href="{{route('login')}}">Regresar</a></p>
        </div>
    </div>
@endsection