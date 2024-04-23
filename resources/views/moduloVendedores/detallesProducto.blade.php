@extends('layouts.header')
@section('cssPage')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/css/navVendedor.css">
    <link rel="stylesheet" href="/css/ProductoDetalle.css">
    <link rel="stylesheet" href="/css/ProductoVendedor.css">
@endsection



@section('main')
    <div class="cont-detalles">
        
                    {{-- <td ><button class="botonActualizar btnDesact" type="button" disabled>Actualizar</button></td> --}}
                    {{-- <form class="eliminar" action="{{route("vendedor.delete.producto",$Producto->producto_id)}}" method="get">
                        @csrf
                        <button class="botonEliminar btnDesact"  type="submit" disabled>Eliminar</button>
                    </form> --}}
                    
                    {{-- <a class="botonEliminar btnDesact" href="" role="button">Eliminar</a> --}}
            
                <form enctype="multipart/form-data" action="{{route("vendor.producto.actualizar",$Producto->producto_id)}}" method="post" class="formin" >
                    <p>Acciones</p>
                    <div class="Acciones">
                        <a class="botonEliminar btnDesact" href="{{route("vendedor.delete.producto",$Producto->producto_id)}}" role="button">Eliminar</a>
                        <button class="botonActualizar btnDesact" type="submit" disabled>Actualizar</button>
                    </div>
                    @csrf
                    @method("put")
                    <label for="nombre">Nombre del producto:</label>
                    <input class="ipt desactivate" disabled type="text" name="nombre" id="nombre" value="{{$Producto->nombre}}">
                    @error('nombre') <p>{{$message}}</p> @enderror
                    <label for="descripcion">Descripción del producto:</label>
                    <textarea class="ipt desactivate" disabled name="descripcion" id="descripcion" cols="30" rows="10">{{$Producto->descripcion}}</textarea>
                    @error('descripcion') <p>{{$message}}</p> @enderror

                    <label for="direccion">Agregar dirección:</label>
                    <input type="text" class="ipt desactivate" disabled name="direccion" value="{{$Producto->direccion}}">
                    @error('direccion') <p>{{$message}}</p> @enderror


                    <label for="cantidad">Cantidad del producto:</label>
                    <input class="ipt desactivate" type="number" name="cantidad" id="cantidad" value="{{$Producto->cantidad}}" disabled>
                    @error('cantidad') <p>{{$message}}</p> @enderror

                    <label for="tipo_envio">Tipo de envio:</label>
                    <select class="ipt desactivate" name="tipo_envio" id="tipo_envio" disabled="disabled">
                        <option value="{{$Producto->tipo_envio}}" selected>{{$Producto->tipo_envio}}</option>
                        <option value="recoger">recoger</option>
                        <option value="envio">envio</option>
                        <option value="ambos">ambos</option>
                    </select>
                    @error('tipo_envio') <p>{{$message}}</p> @enderror
                    
                    <Label for="subcategorias">Categoria</Label>
                    <select class="ipt desactivate" name="categorias" id="subcategoria" disabled="disabled">
                        <option value="{{$subcategoria->subcategoria_id}}" selected>{{$subcategoria->nombreSubCategoria}}</option>
                        @foreach($categorias as $categoria)
                            <optgroup label="{{$categoria->nombre}}">
                                
                                @foreach ($categoria->subcategorias as $subcategoria)
                                    <option value="{{$subcategoria->subcategoria_id}}">{{$subcategoria->nombreSubCategoria}}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>

                    <p>Precio del producto</p>
                    @if ($Producto->oferta)

                        @php
                            $porcentajeDes = (($Producto->precio_ante - $Producto->precio)/ $Producto->precio_ante) * 100
                            
                        @endphp

                        
                        <div class="data-precio">
                            <p>Descuento del Producto aplicado:</p>
                            <p>{{$porcentajeDes}} %</p>

                            <p>Precio del producto con el descuento aplicado:</p>
                            <p>{{$Producto->precio}} mxn</p>
                            
                            <p>Precio original:</p>
                            <p>{{$Producto->precio_ante}} mxn</p>
                        </div>
                        

                        <p>Cambiar el precio original o el descuento</p>
                        <label for="precio_oferta">Descuento en %:</label>
                        <input class="ipt desactivate" type="number" value="{{$porcentajeDes}}" name="descuento" id="precio" disabled>
                        @error('precio') <p>{{$message}}</p> @enderror

                        <label for="precio_normal">Precio original:</label>
                        <input class="ipt desactivate" type="number" value="{{$Producto->precio_ante}}" name="precio" id="precio" disabled>
                        @error('precio_ante') <p>{{$message}}</p> @enderror

                        <label for="fecha_des">Fecha limite del descuento: </label>
                        <input class="ipt desactivate" type="date" name="fecha_lim_desc" id="Fechalimite" value="{{$Producto->fecha_lim_desc}}" disabled>
                        
                    @else
                        <label for="precio">Precio:</label>
                        <input class="ipt desactivate" type="number" name="precio" id="precio" value="{{$Producto->precio}}" disabled>
                        @error('precio') <p>{{$message}}</p> @enderror
                    @endif


                    <div class="principalImg">
                        <p>Images añadidas</p>
                        <p>Selecciona cuales imagenes deseas actualizar:</p>
                        <div class="cont-img">
                            @foreach ($Imagenes as $imagen)
                                <img src="{{$imagen->url}}" class="img">
                                <input type="checkbox" name="imagenBorrar[]" value="{{$imagen->image_id}}">
                            @endforeach    
                        </div>
                            <p>carga las nuevas imagenes</p>
                            <div class="btnAddImg">
                                <input name="imagenActualizar[]" type="file" id="addImg" accept="image/*"  multiple />
                                <label for="addImg" class="btnText btnConfirm">
                                    <i class='bx bxs-file-image'></i>
                                    <span>Agregar imagen</span> 
                                </label>
                            </div>
                                <div class="img-nuevas">
                                </div>
                            
                        
                    </div>

                    
                    
                </form>
            <div>
                <p>¿Deseas habilitar las opciones de actualizar y borrar en este producto?</p>
                
                <div class="boton">
                    <input type="checkbox" name="habilitar" id="habilitar" class="check">
                    <label for="habilitar" class="lbl-switch"></label>
                </div>
                
            </div>
        
    </div>
@endsection

@section('jsPage')
    <script src="/js/moduloProducto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection