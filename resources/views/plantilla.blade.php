@extends('layouts.header')

{{-- Agreguen solo el archivo css del modulo en el que están --}}
{{-- El resto de estilos se encuentran en el archivo globales --}}
@section('cssPage')

@endsection

{{-- Agregar esta parte si necesitan el submenu, eliminarla si no utilizan el subMenu --}}
@section('subMenu')
    @include('layouts.subHeader')
@endsection
{{--  --}}

{{-- Contenido de la pagina --}}
@section('main')

@endsection

{{-- Agregar los js de su modulo --}}
@section('jsPage')

@endsection