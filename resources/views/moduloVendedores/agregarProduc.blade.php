@extends('layouts.header')

@section("cssPage")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/css/ProductoVendedor.css">
    <link rel="stylesheet" href="/css/AgregarProducto.css">
@endsection

@section('main')
    <div class="contenido-principal">
        <form action="{{route("vendedor.agg.producto")}}" method="POST" enctype="multipart/form-data"">
            @csrf
            <div class="datos_producto">
                <h1 class="subtitle1">Nuevo Producto</h1>
                <div class="info_principal">
                    <label class="labFomr" for="">Nombre del producto</label>
                    <input class="inlargo" type="text" name="nombre">
                    @error('nombre') <p>{{$message}}</p> @enderror
                    <label class="labFomr" for="">Descripción del producto</label>
                    <textarea class="inlargo" name="descripcion" id="" cols="30" rows="10"></textarea>
                    @error('descripcion') <p>{{$message}}</p> @enderror
                    <label class="labFomr" for="">Precio</label>
                    <input class="incorto" type="number" name="precio" id="">
                    @error('precio') <p>{{$message}}</p> @enderror
                    <label class="labFomr" for="">Cantidad</label>
                    <input class="incorto" type="number" name="cantidad" id="">
                    @error('cantidad') <p>{{$message}}</p> @enderror
                    @error('precio_ante') <p>{{$message}}</p> @enderror
                    @error('imagen') <p>{{$message}}</p> @enderror
                </div>
                <div class="info_entrega">
                    <h2 class="subtitle">Tipo de entrega</h2>
                    <div class="info_tipos_entrega">
                        <input  type="radio" name="" id="">
                        <label class="labFomr" for="">Recoger</label>
                        
                        <input type="radio" name="" id="">
                        <label class="labFomr" for="">Envio</label>
                        
                        <input type="radio" name="" id="">
                        <label class="labFomr" for="">Ambos</label>
                    </div>
                    <div class="vinculo_direccion">
                        <input type="checkbox" name="" id="">
                        <p>Vincular dirección: </p>
                    </div>
                    <div class="agregar_direccion">
                        <label  class="labFomr" for="">Agregar una nueva dirección</label>
                        <input class="inlargo" type="text" name="" id="">
                    </div>
                </div>
                <div class="btn-avanzado-des">Avanzado</div>
            </div>
            <div class="avanzado">
                <div class="opc_avanzada ocultar">
                    <div class="centro-agg-img">
                        <h3 class="subtitle">Configuración avanzada</h3>
                        <img class="img-central"  src="https://www.innovasport.com/medias/gorra-new-era-59fifty-chicago-white-sox-authentic-2018-is-70358700-1.jpg?context=bWFzdGVyfGltYWdlc3wyMTc5OTh8aW1hZ2UvanBlZ3xpbWFnZXMvaGE1L2gzYy85NzkzNjU5NDA0MzE4LmpwZ3xiMjhkNjc1ZGE5YWQ0YzQxMTg2MmU3ZjY2ZWZlYjkzYzNmY2E2YWU2ZGQyYmFhZjFjMjE5ZjNlYTMzNjAwYzRi" alt="">
                        <label for="addImg" class="btnText btnConfirm">
                            <i class='bx bxs-file-image'></i>
                            <span>Agregar imagen</span> 
                        </label>
                    </div>
                    
                    <p>Imagenes añadidas</p>
                    <div class="imgs-agg">
                        <img class="img-mas" src="https://www.innovasport.com/medias/gorra-new-era-59fifty-chicago-white-sox-authentic-2018-is-70358700-1.jpg?context=bWFzdGVyfGltYWdlc3wyMTc5OTh8aW1hZ2UvanBlZ3xpbWFnZXMvaGE1L2gzYy85NzkzNjU5NDA0MzE4LmpwZ3xiMjhkNjc1ZGE5YWQ0YzQxMTg2MmU3ZjY2ZWZlYjkzYzNmY2E2YWU2ZGQyYmFhZjFjMjE5ZjNlYTMzNjAwYzRi" alt="">
                        <img class="img-mas" src="https://www.innovasport.com/medias/gorra-new-era-59fifty-chicago-white-sox-authentic-2018-is-70358700-1.jpg?context=bWFzdGVyfGltYWdlc3wyMTc5OTh8aW1hZ2UvanBlZ3xpbWFnZXMvaGE1L2gzYy85NzkzNjU5NDA0MzE4LmpwZ3xiMjhkNjc1ZGE5YWQ0YzQxMTg2MmU3ZjY2ZWZlYjkzYzNmY2E2YWU2ZGQyYmFhZjFjMjE5ZjNlYTMzNjAwYzRi" alt="">
                        <img class="img-mas" src="https://www.innovasport.com/medias/gorra-new-era-59fifty-chicago-white-sox-authentic-2018-is-70358700-1.jpg?context=bWFzdGVyfGltYWdlc3wyMTc5OTh8aW1hZ2UvanBlZ3xpbWFnZXMvaGE1L2gzYy85NzkzNjU5NDA0MzE4LmpwZ3xiMjhkNjc1ZGE5YWQ0YzQxMTg2MmU3ZjY2ZWZlYjkzYzNmY2E2YWU2ZGQyYmFhZjFjMjE5ZjNlYTMzNjAwYzRi" alt="">
                    </div>
                    <div class="cortos-principal">
                        <div class="inscortos">
                            <label class="labFomr" for="">Descuento inicial</label>
                            <input class="incorto" type="number" name="descuento" id="">
    
                        </div>
                        <div class="inscortos">
                            <label class="labFomr " for="">Fecha limite de descuento</label>
                            <input class="incorto" type="date" name="fechaLimite" id="">
                        </div>
                    </div>
                    <div class="btns_acciones">
                        <a class="btnregresar" href="{{route("vendedor.pedidos")}}">Regresar</a>
                        <button class="aggProduc" type="submit">Agregar Producto</button>
                    </div>
                    
                    <div class="btn-avanzado-close"><span class="material-symbols-outlined iconn">cancel</span></div>
                </div>
                <div class="img_producto">
                    <img class="img-principal" src="https://www.innovasport.com/medias/gorra-new-era-59fifty-chicago-white-sox-authentic-2018-is-70358700-1.jpg?context=bWFzdGVyfGltYWdlc3wyMTc5OTh8aW1hZ2UvanBlZ3xpbWFnZXMvaGE1L2gzYy85NzkzNjU5NDA0MzE4LmpwZ3xiMjhkNjc1ZGE5YWQ0YzQxMTg2MmU3ZjY2ZWZlYjkzYzNmY2E2YWU2ZGQyYmFhZjFjMjE5ZjNlYTMzNjAwYzRi" alt="">
                    <div class="btnAddImg">
                        <input name="imagen" type="file" id="addImg" />
                        <label for="addImg" class="btnText btnConfirm">
                            <i class='bx bxs-file-image'></i>
                            <span>Agregar imagen</span> 
                        </label>
                    </div>
                    <div class="btns_acciones">
                        <a class="btnregresar" href="{{route("vendedor.pedidos")}}">Regresar</a>
                        <button class="aggProduc" type="submit">Agregar Producto</button>
                        <br>
                    </div>
                    
                </div>
                
            </div>
            

        </form>
        
    </div>
    
@endsection

@section('jsPage')
    <script src="/js/moduloVendedor.js"></script>
@endsection





    
