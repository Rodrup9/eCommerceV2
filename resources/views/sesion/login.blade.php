@extends('sesion.layouts.mainSesion')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/loginStyles.css">
@endsection

@section('main')
    <div class="container-left">
        <div class="container-center">
            <h1>Iniciar Sesión</h1>
            <form action="{{route('signin')}}" method="POST">
                @csrf
                <fieldset>
                    <label for="">Usuario o correo</label>
                    <input type="text" name="search">
                </fieldset>
                <fieldset>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                </fieldset>
                <button class="submit" type="submit">Entrar</button>
                <p><a href="{{route('recuperar')}}">¿Problemas al inciar sesión?</a></p>
            </form>
            <p class="changePage"><a href="{{route('register')}}">Registrarse</a></p>
        </div>
        
    </div>
@endsection