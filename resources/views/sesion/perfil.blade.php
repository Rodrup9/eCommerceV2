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
                <h1>Nombre</h1>
                <p>Nombre de ejemplo</p>

                <h1>Apellido paterno</h1>
                <p>Ejemplo de appPaterno</p>

                <h1>Apellido materno</h1>
                <p>Ejemplo de appMaterno</p>

                <h1>Correo eletrónico</h1>
                <p>example@gmail.com</p>
            </div>
        </div>
    </div>
@endsection