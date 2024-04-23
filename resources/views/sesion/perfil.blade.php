@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/perfil.css">
@endsection

@section('main')
    <div class="container">
        <div class="usuario">
            <form action="{{ route('actImg') }}" method="POST" class="usuario" enctype="multipart/form-data">
                @csrf
                @if ($imag != null)
                    <img src="{{ $imag->url }}" alt="Usuario" class="imgUser">
                    <div class="btnAddImg">
                        <input name="imagen[]" type="file" id="addImg" accept="image/*" multiple />
                        <label for="addImg" class="btnText btnConfirm">
                            <i class='bx bxs-file-image'></i>
                            <span>Actualizar imagen</span>
                        </label>
                    @else
                        <img src="img/user.png" alt="Usuario" class="imgUser">
                        <div class="btnAddImg">
                            <input name="imagen[]" type="file" id="addImg" accept="image/*" multiple />
                            <label for="addImg" class="btnText btnConfirm">
                                <i class='bx bxs-file-image'></i>
                                <span>Agregar imagen</span>
                            </label>
                @endif
        </div>
        <button id="boton" style="display: none;" class="btnAparece">Actualizar foto de perfil</button>
        </form>
    </div>

    <div class="right">
        <div class="datos">
            <h1>Nombre de usuario:</h1>
            <p>{{ $username }}</p>
        </div>
        <div class="datos">
            <h1>Nombre:</h1>
            <p>{{ $nombre }}</p>
        </div>
        <div class="datos">
            <h1>Apellido paterno:</h1>
            <p>{{ $apellido_pa }}</p>
        </div>
        <div class="datos">
            <h1>Apellido materno:</h1>
            <p>{{ $apellido_ma }}</p>
        </div>
        <div class="datos">
            <h1>Correo eletrónico:</h1>
            <p>{{ $correo }}</p>
        </div>
    </div>

    <div class="acciones">
        <div class="sub-acciones">
            <a href="{{ route('actPerfil') }}">Actualizar</a>
            <a href="{{ route('actContraseña') }}">¿Deseas cambiar su contraseña?</a>
        </div>

        @if ($consul and $consul != null and count($consul) > 0)
        @else
            <a href="{{ route('vuelVen') }}">Vuelvete vendedor</a>
        @endif

    </div>

    </div>
@endsection

@section('jsPage')
    <script src="/js/sesion/addImg.js"></script>
@endsection
