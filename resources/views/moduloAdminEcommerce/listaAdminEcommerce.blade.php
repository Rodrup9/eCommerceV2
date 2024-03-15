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
        <a href="/adminListaEcommerce/detalles/algo" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
        <a href="#" class="liListaContent">
            <div class="liNombreList">
                <p>Nombre</p>
            </div>
            <div class="liDescriptionList">
                <p>Descripcion</p>
            </div>
            <div class="liDateList">
                <p>Fecha</p>
            </div>
        </a>
    </main>
@endsection

@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection