@extends('layouts.header')

@section('cssPage')

@endsection

@section('main')
    <div>
        <form action="{{route('actConfirmacion')}}" method="POST" id="formulario">
            @csrf

            @method('PUT')

            <fieldset>
                <label for="">Nombre de usuario</label>
                <input type="text" name="username" value="{{$username}}" id="usuario">
                @foreach ($errors->get('username') as $item)
                    <span class="alert">*{{$item}}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset>
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="{{$nombre}}" id="nombre">
                @foreach ($errors->get('nombre') as $item)
                    <span class="alert">*{{$item}}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset>
                <label for="">Apellido paterno</label>
                <input type="text" name="apellido_pa" value="{{$apellido_pa}}" id="apellido_pa">
                @foreach ($errors->get('apellido_pa') as $item)
                    <span class="alert">*{{$item}}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset>
                <label for="">Apellido materno</label>
                <input type="text" name="apellido_ma" value="{{$apellido_ma}}" id="apellido_ma">
                @foreach ($errors->get('apellido_ma') as $item)
                    <span class="alert">*{{$item}}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset>
                <label for="">Correo electrónico</label>
                <input type="text" name="email" value="{{$correo}}" id="correo">
                @foreach ($errors->get('email') as $item)
                    <span class="alert">*{{$item}}</span>
                    <br>
                @endforeach
            </fieldset>

            <button type="submit">Actualizar</button>
        </form>

        <a href="{{route('perfil')}}" style="color: red">Cancelar</a>
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloVendedor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection