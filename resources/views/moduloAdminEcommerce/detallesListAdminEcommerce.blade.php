@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/moduloAdminEcommerce.css">    
@endsection

@section('main')
    <div class="detallesPage">
        <main class="mainDetallesList">
            <header class="headerDetalles">
                <a href="/adminListaEcommerce/algo" class="arrowExit">
                    <i class='bx bx-left-arrow-alt'></i>
                </a>
                <div class="nameObject">
                    <h3>Nombre de usuario:</h3>
                </div>
            </header>
            <section class="sectionDetalles">
                <div class="descriptionDetalles">
                    {{$nameDetalle->nombre_de_usuario}}
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
                    <p>Nombre:  {{$nameDetalle->nombre}}</p>
                    <p>Apellido Paterno:  {{$nameDetalle->apellido_pa}}</p>
                    <p>Apellido Materno:  {{$nameDetalle->apellido_ma}}</p>
                    <p>Correo Electronico:  {{$nameDetalle->email}}</p>
                    <p>Fecha de creación de la cuenta:  {{$nameDetalle->created_at}}</p>
                </div>
                <div class="comentariosDetalles">
                    <div class="comentarioObject">
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bx-star' ></i></span>
                        <span class="start"><i class='bx bx-star' ></i></span>
                        <div class="bodyComment">
                            <div class="tComment">
                                Nombre
                            </div>
                            <div class="bComment">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur est recusandae fugiat maiores. Modi voluptatem, quo corrupti eos, ut perspiciatis alias harum culpa, mollitia accusamus sapiente accusantium asperiores earum. Deleniti.
                            </div>
                        </div>
                    </div>
                    <div class="comentarioObject">
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bx-star' ></i></span>
                        <span class="start"><i class='bx bx-star' ></i></span>
                        <div class="bodyComment">
                            <div class="tComment">
                                Nombre
                            </div>
                            <div class="bComment">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur est recusandae fugiat maiores. Modi voluptatem, quo corrupti eos, ut perspiciatis alias harum culpa, mollitia accusamus sapiente accusantium asperiores earum. Deleniti.
                            </div>
                        </div>
                    </div>
                    <div class="comentarioObject">
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bxs-star' ></i></span>
                        <span class="start"><i class='bx bx-star' ></i></span>
                        <span class="start"><i class='bx bx-star' ></i></span>
                        <div class="bodyComment">
                            <div class="tComment">
                                Nombre
                            </div>
                            <div class="bComment">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur est recusandae fugiat maiores. Modi voluptatem, quo corrupti eos, ut perspiciatis alias harum culpa, mollitia accusamus sapiente accusantium asperiores earum. Deleniti.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <aside class="asideDetalles">
            <form action="{{route('deleteUser',$nameDetalle->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">
                    <div class="deleteObject">
                        <i class='bx bx-trash'></i>
                    </div>
                </button>
            </form>

            <div class="saveObject">
                <i class='bx bx-bookmark' ></i>
            </div>
            <div class="messageObject">
                <i class='bx bx-message-alt-add' ></i>
            </div>
        </aside>
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloAdminEcommerce.js"></script>
@endsection