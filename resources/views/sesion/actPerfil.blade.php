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
                edit_square
            </span>
            <h1>Modificar perfil</h1>
        </div>
        <form action="{{ route('actConfirmacion') }}" method="POST" id="formulario" class="formConfirm">
            @csrf

            @method('PUT')

            <fieldset class="inputConfirm">
                <label for="">Nombre de usuario</label>
                <input type="text" name="username" value="{{ $username }}" id="usuario">
                @foreach ($errors->get('username') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset class="inputConfirm">
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="{{ $nombre }}" id="nombre">
                @foreach ($errors->get('nombre') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset class="inputConfirm">
                <label for="">Apellido paterno</label>
                <input type="text" name="apellido_pa" value="{{ $apellido_pa }}" id="apellido_pa">
                @foreach ($errors->get('apellido_pa') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset class="inputConfirm">
                <label for="">Apellido materno</label>
                <input type="text" name="apellido_ma" value="{{ $apellido_ma }}" id="apellido_ma">
                @foreach ($errors->get('apellido_ma') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset class="inputConfirm">
                <label for="">Correo electrónico</label>
                <input type="text" name="email" value="{{ $correo }}" id="correo">
                @foreach ($errors->get('email') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
            </fieldset>

            <button type="submit" class="accionForm">Actualizar</button>
        </form>

        <a href="{{ route('perfil') }}" class="accionFormCancel">Cancelar</a>
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloVendedor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
