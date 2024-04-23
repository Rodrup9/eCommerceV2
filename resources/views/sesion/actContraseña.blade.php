@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/perfil.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('main')
    <div class="containerForm">
        <div class="titleForm">
            <span class="material-symbols-outlined">
                lock
            </span>
            <h1>Cambia tu contraseña</h1>
        </div>

        <form action="{{ route('confirmContraseña') }}" class="formConfirm" method="POST">
            @csrf
            @method('PUT')

            <fieldset class="inputConfirm">
                <label for="">Nueva contraseña</label>
                <input type="password" name="password">
                @foreach ($errors->get('password') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset class="inputConfirm">
                <label for="">Repite tu contraseña</label>
                <input type="password" name="password_confirmation">
            </fieldset>

            <button type="submit" class="accionForm">Actualizar</button>
        </form>

        <a href="{{ route('perfil') }}" class="accionFormCancel">Cancelar</a>
    </div>
@endsection
