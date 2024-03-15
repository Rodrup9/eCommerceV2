@extends('layouts.header')


@section('cssPage')
    <link rel="stylesheet" href="/css/moduloInicio.css">
    <link rel="stylesheet" href="/css/components.css">
@endsection


@section('subMenu')
    @include('layouts.subHeader')
@endsection

@section('main')
    @include('layouts.asideDes')
    <div class="divCenterMain">
        <main class="mainCatalogo">
            <section class="boxProductosCatalogo">
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi nobis, illo necessitatibus dignissimos minus tenetur nihil et quos cupiditate dolorum temporibus dolores quidem quam, minima earum nostrum assumenda enim magni? Corporis assumenda, modi laborum omnis aliquid iste repellendus a quaerat. Tempora ut repellendus ipsa architecto ipsam provident delectus. Neque, fuga?
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag"></x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ipsa facilis dolorum maiores saepe ad ut quaerat, aliquid quas aspernatur expedita natus, voluptatibus itaque tenetur vel perspiciatis illo veniam! Harum vel pariatur dolor reiciendis quos!
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
                <x-card-product :img="$products['product']['img']">
                    <x-slot name="producto">{{$products['product']['name']}}</x-slot>
                    <x-slot name="tag">{{$products['product']['tag']}}</x-slot>
                    <x-slot name="descuento">{{$products['product']['descuento']}}</x-slot>
                    <x-slot name="precio">{{$products['product']['precio']}}</x-slot>
                    {{$products['product']['description']}}
                </x-card-product>
            </section>
        </main>
    </div>
@endsection

@section('jsPage')
    <script src="../js/moduloInicio.js"></script>
@endsection