@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/perfil.css">
@endsection

@section('main')

    <div class="container">
        <div class="usuario">
            <img src="img/user.png" alt="Usuario">
        </div>

        <div class="right">
            <div class="datos">
                <h1>Nombre de usuario</h1>
                <p>{{$username}}</p>

                <h1>Nombre</h1>
                <p>{{$nombre}}</p>

                <h1>Apellido paterno</h1>
                <p>{{$apellido_pa}}</p>

                <h1>Apellido materno</h1>
                <p>{{$apellido_ma}}</p>

                <h1>Correo eletrónico</h1>
                <p>{{$correo}}</p>
            </div>
        </div>
    <a href="{{route('actPerfil')}}">Actualizar</a>
    <a href="{{route('actContraseña')}}">¿Deseas cambiar su contraseña?</a>
    <a href="{{route('vuelVen')}}">Vuelvete vendedor</a>
    </div>
@endsection