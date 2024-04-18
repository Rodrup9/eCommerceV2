<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Image;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller{

    public function NuevoProducto(): View{
        $categorias = Categoria::with("subcategorias")->get();
        return view("moduloVendedores.agregarProduc",["nameView"=> "agregarProducto","categorias" =>$categorias]);
    }

    public function AgregarProducto(StoreProductoRequest $ProductoRequest){
        $user = Auth::user();
        $producto = new Producto;
        $producto->nombre = $ProductoRequest->nombre;
        $producto->descripcion = $ProductoRequest->descripcion;
        $producto->cantidad = $ProductoRequest->cantidad;
        $producto->direccion = $ProductoRequest->direccion;
        $producto->tipo_envio = $ProductoRequest->tipo_envio;
        $producto->subcategoria_id = $ProductoRequest->categorias;
        $producto->user_id = $user->id;

        if(empty($ProductoRequest->descuento)){
            $producto->precio = $ProductoRequest->precio;
            $producto->oferta = false;
            $producto->precio_ante = null;
            $producto->fecha_lim_desc = null;
        }else{
            $producto->oferta = true;
            // $descuento = $ProductoRequest->precio - $ProductoRequest->descuento;
            $descuento = ($ProductoRequest->descuento * $ProductoRequest->precio) / 100;
            $producto->precio = $descuento;
            $producto->precio_ante = $ProductoRequest->precio;
            $producto->fecha_lim_desc = $ProductoRequest->FechaLimite;
        }
        $producto->save();
        

        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dlxpr11ok', 
                'api_key' => '684419351949932', 
                'api_secret' => 'P2F1tpvLqz6681avsE0oxPQeBV0'],
            'url' => [
                'secure' => true]]);
        
        if($ProductoRequest->hasFile("imagen")){
            $total_imagen = $ProductoRequest->file("imagen");
            foreach ($total_imagen as $img) {
                $nombreImagen = pathinfo($img->getClientOriginalName(),PATHINFO_FILENAME);
                $cloudinary = new UploadApi();
                $resultado=$cloudinary->upload($img->getRealPath(),["folder"=>"Productos","public_id"=>$nombreImagen]);
                $url = $resultado["secure_url"];
                $public_id = $resultado["public_id"];
                $imagen = new Image;
                $imagen->url = $url;        
                $imagen->public_id = $public_id;
                $producto->images()->save($imagen);
            }
        }

        //operador terneario 
        // $valor = ($ProductoRequest->hasFile("imagen")) ? "tiene imagen" : "no tiene imagen";
        return view("moduloVendedores.homeVendedor",["nameView"=> "Home"]);
    }

    public function EliminarProductos($producto){
        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dlxpr11ok', 
                'api_key' => '684419351949932', 
                'api_secret' => 'P2F1tpvLqz6681avsE0oxPQeBV0'],
            'url' => [
                'secure' => true]]);

        $eliminarProducto=  Producto::findOrFail($producto);
        foreach ($eliminarProducto->images as $imagen) {
            $cloudinary = new UploadApi();
            $cloudinary->destroy($imagen->public_id,["resource_type" => "image", "type" => "upload"]);
        }
        $eliminarProducto->images()->delete();
        $eliminarProducto->delete();
        return view("moduloVendedores.homeVendedor",["nameView"=> "Home"]);
    }

    public function ActualizarProducto(StoreProductoRequest $ProductoRequest,$producto){

        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dlxpr11ok', 
                'api_key' => '684419351949932', 
                'api_secret' => 'P2F1tpvLqz6681avsE0oxPQeBV0'],
            'url' => [
                'secure' => true]]);

        $ProductoAct = Producto::findOrFail($producto);
        $ProductoAct->nombre = $ProductoRequest->nombre;
        $ProductoAct->descripcion =$ProductoRequest->descripcion;
        $ProductoAct->cantidad =$ProductoRequest->cantidad;
        $ProductoAct->tipo_envio =$ProductoRequest->tipo_envio;
        $ProductoAct->direccion =$ProductoRequest->direccion;
        $ProductoAct->subcategoria_id = $ProductoRequest->categorias;

        if (empty($ProductoRequest->descuento)) {
            $ProductoAct->precio = $ProductoRequest->precio;
        }else{
            // $descuento = $ProductoRequest->precio - $ProductoRequest->descuento;
            $descuento = ($ProductoRequest->descuento * $ProductoRequest->precio) / 100;
            $ProductoAct->precio = $descuento;
            $ProductoAct->precio_ante = $ProductoRequest->precio;
            $ProductoAct->fecha_lim_desc = $ProductoRequest->fecha_lim_desc;
        }
        $ProductoAct->save();

        if(isset($ProductoRequest->imagenBorrar)){
            foreach($ProductoRequest->imagenBorrar as $imgDelete){
                $imagenBorrar = Image::findOrFail($imgDelete);
                $cloudinary = new UploadApi();
                $cloudinary->destroy($imagenBorrar->public_id,["resource_type" => "image", "type" => "upload"]);
                $imagenBorrar->delete();
            }

        }   

        if($ProductoRequest->hasFile("imagenActualizar")){
            $total_imagen = $ProductoRequest->file("imagenActualizar");
            foreach ($total_imagen as $img) {
                $nombreImagen = pathinfo($img->getClientOriginalName(),PATHINFO_FILENAME);
                $cloudinary = new UploadApi();
                $resultado=$cloudinary->upload($img->getRealPath(),["folder"=>"Productos","public_id"=>$nombreImagen]);
                $url = $resultado["secure_url"];
                $public_id = $resultado["public_id"];
                $imagen = new Image;
                $imagen->url = $url;        
                $imagen->public_id = $public_id;
                $ProductoAct->images()->save($imagen);
            }
        }

        return view("moduloVendedores.homeVendedor",["nameView"=> "Home"]);
    }


}
