@extends('sesion.layouts.mainSesion')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/mainCuenta.css">
@endsection

@section('main')
    <div class="container-center">
        <div class="center-elements">
            <h1>Reestablece tú contraseña</h1>
            <p class="descripcion">Crea una nueva contraseña para correp@gmail.com, asegurate de no olvidarla, y no la compartas con nadie</p>
            <form action="" method="POST">
                @method('put')

                @csrf
                
                <fieldset>
                    <label for="">Nueva contraseña</label>
                    <input type="password" name="password">
                </fieldset>

                <fieldset>
                    <label for="">Confirma la contraseña</label>
                    <input type="password" name="password_confirmation">
                </fieldset>
                <button class="submit" type="submit">Confirmar contraseña</button>
            </form>
            <p class="regresar"><a href="{{route('login')}}">Regresar</a></p>
        </div>
    </div>
@endsection