@extends('layouts.header')

@section("cssPage")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/css/ProductoVendedor.css">
    <link rel="stylesheet" href="/css/AgregarProducto.css">
@endsection

@section('main')
    <div class="contenido-principal">
        <form class="formAgg" action="{{route("vendedor.agg.producto")}}" method="POST" enctype="multipart/form-data"">
            @csrf
            <div class="datos_producto">
                <h1 class="subtitle1">Nuevo Producto</h1>
                <div class="info_principal">
                    <label class="labFomr" for="">Nombre del producto</label>
                    <input class="inlargo confirmacion" type="text" name="nombre" value="{{old("nombre")}}">
                    @error('nombre') <p>{{$message}}</p> @enderror
                    <label class="labFomr" for="">Descripción del producto</label>
                    <textarea class="inlargo confirmacion" name="descripcion" id="" cols="30" rows="10">{{old("descripcion")}}</textarea>
                    @error('descripcion') <p>{{$message}}</p> @enderror
                    <label class="labFomr" for="">Precio</label>
                    <input class="incorto confirmacion" type="number" name="precio" id="" value="{{old("precio")}}">
                    @error('precio') <p>{{$message}}</p> @enderror
                    <label class="labFomr" for="">Cantidad</label>
                    <input class="incorto confirmacion" type="number" name="cantidad" id="cantidad" value="{{old("cantidad")}}">
                    @error('cantidad') <p>{{$message}}</p> @enderror
                    @error('precio_ante') <p>{{$message}}</p> @enderror
                    @error('imagen') <p>{{$message}}</p> @enderror
                    @error('tipo_envio') <p>{{$message}}</p> @enderror
                    @error('categorias') <p>{{$message}}</p> @enderror

                    <h2>Categorias</h2>
                    <select name="categorias" id="selects" class="confirmacion">
                        <option selected disabled value="">Elegir :</option>
                        @foreach ($categorias as $categoria)  
                            <optgroup label="{{$categoria->nombre}}">
                                
                                @foreach ($categoria->subcategorias as $subcategoria)
                                    <option value="{{$subcategoria->subcategoria_id}}">{{$subcategoria->nombreSubCategoria}}</option>
                                @endforeach
                            </optgroup>                            
                        @endforeach
                    </select>
                    
                    
                </div>
                <div class="info_entrega">
                    <h2 class="subtitle">Tipo de entrega</h2>
                    <div class="info_tipos_entrega">
                        <select id="selects" name="tipo_envio" class="confirmacion">
                            <option selected disabled value="">nada</option>
                            <option value="recoguer">Recoger</option>
                            <option value="envio">Envio</option>
                            <option value="ambos">Ambos</option>
                        </select>
                    </div>
                    <div class="agregar_direccion">
                        <label  class="labFomr" for="">Agregar una nueva dirección</label>
                        <input class="inlargo confirmacion" type="text" name="direccion" id="direccion" value="{{old("direccion")}}">
                    </div>
                </div>
                <div class="btnText btnConfirm btn-avanzado-des">Avanzado</div>
            </div>
            <div class="avanzado">
                <div class="opc_avanzada ocultar">
                    <div class="centro-agg-img">
                        <h3 class="subtitle">Configuración avanzada</h3>
                        
                        <label for="addImg" class="btnText btnConfirm">
                            <i class='bx bxs-file-image'></i>
                            <span>Agregar imagen</span> 
                        </label>
                    </div>
                    
                    <p>Imagenes añadidas</p>
                    <div class="imgs-agg">
                        
                    </div>
                    <div class="cortos-principal">
                        <div class="inscortos">
                            <label class="labFomr" for="">Agregar Descuento %</label>
                            <input class="incorto" type="number" name="descuento" id="descuento" value="{{old("descuento")}}">
    
                        </div>
                        <div class="inscortos">
                            <label class="labFomr" for="">Fecha limite de descuento</label>
                            <input class="incorto" type="date" name="FechaLimite" id="FechaLimite" value="{{old("FechaLimite")}}">
                        </div>
                    </div>
                    <div class="btns_acciones">
                        <a class="btnText btnConfirm" href="{{route("vendedor")}}">Regresar</a>
                        <button class="btnText btnConfirm" type="submit">Agregar Producto</button>
                    </div>
                    
                    <div class="btn-avanzado-close"><span class="material-symbols-outlined iconn">cancel</span></div>
                </div>
                <div class="img_producto">
                    <img class="img-principal" id="imagen" src="" alt="">
                    <div class="btnAddImg">
                        <input name="imagen[]" type="file" id="addImg" accept="image/*" multiple />
                        <label for="addImg" class="btnText btnConfirm">
                            <i class='bx bxs-file-image'></i>
                            <span>Agregar imagen</span> 
                        </label>
                    </div>
                    <div class="btns_acciones">
                        <a class="btnText btnConfirm" href="{{route("vendedor")}}">Regresar</a>
                        <button class="btnText btnConfirm" type="submit">Agregar Producto</button>
                        
                        <br>
                    </div>
                    
                </div>
            </div>
        </form>
    
    </div>

@endsection

@section('jsPage')
    <script src="/js/moduloVendedor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
