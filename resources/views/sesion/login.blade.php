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
                    <label for="">Correo electrónico</label>
                    <input type="email" name="email" value="{{old('email')}}">
                    @foreach ($errors->get('email') as $item)
                        <span class="alert">*{{$item}}</span>
                        <br>
                    @endforeach
                </fieldset>
                <fieldset>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    @foreach ($errors->get('password') as $item)
                        <span class="alert">*{{$item}}</span>
                        <br>
                    @endforeach
                </fieldset>
                <fieldset class="remenber">
                    <input type="checkbox" name="remenber">
                    <label for="">Recuerdame</label>
                </fieldset>
                <button class="submit" type="submit">Entrar</button>
                <p><a href="{{route('recuperar')}}">¿Problemas al inciar sesión?</a></p>
            </form>
        </div>
        
        <div class="container-right">
            <h1 class="title-right">Ingresar con</h1>
            <div class="elements">
                <div class="round"><a href="/google-auth/redirect"><img src="img/google.png" alt="Logo de google"></a></div>
            </div>
        </div>

    </div>
@endsection