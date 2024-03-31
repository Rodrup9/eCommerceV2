@extends('sesion.layouts.mainSesion')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/mainCuenta.css">
@endsection

@section('main')
    <div class="container-center">
        <div class="center-elements">
            <h1>Recuperación de cuenta</h1>
            <p class="descripcion">Ingrese el código que fue enviado por medio del correo electrónico que proporcionó</p>
            <form action="{{route('reestablecer')}}" method="GET">
                @csrf
                <fieldset>
                    <label for="">Código de verificación</label>
                    <input type="text" name="code">
                    @foreach ($errors->all() as $item)
                        <span class="alert">*{{$item}}</span>
                        <br>
                    @endforeach
                </fieldset>
                <button class="submit" type="submit">Enviar código</button>
            </form>
            <p class="regresar"><a href="{{route('login')}}">Regresar</a></p>
        </div>
    </div>
@endsection