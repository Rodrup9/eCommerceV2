@extends('layouts.header')

@section('cssPage')

@endsection

@section('main')
    <div>

        <h1>Cambia tu contraseña</h1>

        <form action="{{route('confirmContraseña')}}" method="POST">
            @csrf

            @method('PUT')

            <fieldset>
                <label for="">Nueva contraseña</label>
                <input type="password" name="password">
                @foreach ($errors->get('password') as $item)
                    <span class="alert">*{{$item}}</span>
                    <br>
                @endforeach
            </fieldset>

            <fieldset>
                <label for="">Repite tu contraseña</label>
                <input type="password" name="password_confirmation">
            </fieldset>

            <button type="submit">Actualizar</button>
        </form>

        <a href="{{route('perfil')}}" style="color: red">Cancelar</a>
    </div>
@endsection