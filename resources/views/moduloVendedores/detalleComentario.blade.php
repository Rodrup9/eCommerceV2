@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">    
@endsection

@section('main')
    <div class="detallesPage">
        <main class="mainDetallesList">
            @foreach ($comentarios as $comentario)
                <header class="headerDetalles">
                    <a href="/adminListaEcommerce/algo" class="arrowExit">
                        <i class='bx bx-left-arrow-alt'></i>
                    </a>
                    <div class="nameObject">
                        <h3>Nombre del producto: {{$comentario->nombre}}</h3>
                    </div>
                </header>
                <section class="sectionDetalles">
                    <div class="descriptionDetalles">
                        <p>xxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    </div>
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
                        <p>Descripcion:</p>
                        <p>{{$comentario->descripcion}}</p>
                        <p>Precio:  </p>
                        <p>{{$comentario->precio}}</p>
                        <p>{{$comentario->cantidad}}</p>
                    </div>
                    <div class="comentariosDetalles">
                        @foreach ($comentario->comentarios as $comn)
                            <div class="comentarioObject">
                                <span class="start"><i class='bx bxs-star' ></i></span>
                                <span class="start"><i class='bx bxs-star' ></i></span>
                                <span class="start"><i class='bx bxs-star' ></i></span>
                                <span class="start"><i class='bx bx-star' ></i></span>
                                <span class="start"><i class='bx bx-star' ></i></span>
                                
                                    <div class="bodyComment">
                                        <div class="tComment">
                                            Usuario : {{$comn->user->nombre}}
                                        </div>
                                        <div class="bComment">
                                            {{$comn->descripcion}}
                                        </div>
                                    </div>
                            </div>
                        @endforeach
            @endforeach
                    {{-- {{$comentarios}} --}}
                    
                </div>
            </section>
        </main>
        
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection