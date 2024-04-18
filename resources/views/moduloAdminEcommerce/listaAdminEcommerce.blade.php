@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">
@endsection

@section('subMenu')
    @include('layouts.subHeader')
@endsection

@section('main')
    @include('layouts.asideDes')
    <main class="listAdminEcommerce">
        <div class="tTitleHeadList">
            <div class="tHeadList">
                <h2>Lista de <span>{{$typeList}}</span></h2>
            </div>
        </div>

        @forelse ($usuarios as $user)
            <a href="{{route('adminListDetalles',$user->id)}}" class="liListaContent">
                <div class="liNombreList">
                    <p>{{$user->nombre}}</p>
                </div>
                <div class="liDescriptionList">
                    <p>{{$user->nombre_de_usuario}}</p>
                </div>
                <div class="liDateList">
                    <p>{{$user->email}}</p>
                </div>
            </a>
        @empty
            <p>No hay ningun usuario registrado en la aplicación</p>
        @endforelse
        
        
    </main>
@endsection

@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection