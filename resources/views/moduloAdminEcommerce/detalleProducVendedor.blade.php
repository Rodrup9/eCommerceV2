@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">    
@endsection

@section('main')
    <div class="detallesPage">
        <main class="mainDetallesList">
            @foreach ($productos as $producto)

                <header class="headerDetalles">
                    <a href="/adminListaEcommerce/algo" class="arrowExit">
                        <i class='bx bx-left-arrow-alt'></i>
                    </a>
                    <div class="nameObject">
                        <h3>Usuario : {{$producto->nombre_de_usuario}}</h3>
                    </div>
                </header>
                <section class="sectionDetalles">
                    <div class="sourseDetalles">
                        <p>Califiación</p>
                        <span class="calificacion">75%</span>
                        <div class="">
                            <span class="start"><i class='bx bxs-star' ></i></span>
                            <span class="start"><i class='bx bxs-star' ></i></span>
                            <span class="start"><i class='bx bxs-star' ></i></span>
                            <span class="start"><i class='bx bx-star' ></i></span>
                            <span class="start"><i class='bx bx-star' ></i></span>
                        </div>
                    </div>
                    <div class="moreDetalles">
                        <p>Nombre : {{$producto->nombre}} </p>
                        <p>Apellido paterno: {{$producto->apellido_pa}}</p>
                        <p>Apellido materno: {{$producto->apellido_ma}} </p>
                        <p>Fecha de creacion de la cuenta: {{$producto->created_at}}</p>
                        <p>Fecha de actualizacion de la cuenta: {{$producto->updated_at}}</p>
                    </div>
                    <div class="comentariosDetalles">
                        @foreach ($producto->productos as $pro)
                            <div class="comentarioObject">
                                    <div class="bodyComment">
                                        <div class="tComment">
                                            Nombre del producto : {{$pro->nombre}}
                                        </div>
                                        <div class="bComment">
                                            Descripción: {{$pro->descripcion}}
                                            
                                        </div>
                                        <div class="imgs">
                                            @foreach($pro->images as $img)
                                                <img src="{{$img->url}}" alt="">
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                        @endforeach
            @endforeach
                    
                    
                </div>
            </section>
        </main>
        
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection