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
                    <h3>Nombre</h3>
                </div>
            </header>
            <section class="sectionDetalles">
                <div class="descriptionDetalles">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde impedit vero sequi soluta exercitationem facere cupiditate veniam, reprehenderit voluptatum sit ea perferendis necessitatibus saepe.
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, doloremque perspiciatis. Aut esse rem ex magni voluptatum, illum porro illo nostrum praesentium nobis in, ea voluptatibus nisi facilis sint ipsum.
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
            <div class="deleteObject">
                <i class='bx bx-trash'></i>
            </div>
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