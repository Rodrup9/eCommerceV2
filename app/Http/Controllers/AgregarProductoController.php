<?php

namespace App\Http\Controllers;

use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Image;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class AgregarProductoController extends Controller{

    public function NuevoProducto(): View{
        return view("moduloVendedores.agregarProduc",["nameView"=> "agregarProducto"]);
    }

    public function AgregarProducto(StoreProductoRequest $ProductoRequest){
        $producto = new Producto;
        $producto->nombre = $ProductoRequest->nombre;
        $producto->descripcion = $ProductoRequest->descripcion;
        $producto->cantidad = $ProductoRequest->cantidad;
        $producto->direccion = $ProductoRequest->direccion;
        $producto->tipo_envio = $ProductoRequest->tipo_envio;
        
        if(empty($ProductoRequest->descuento)){
            $producto->precio = $ProductoRequest->precio;
            $producto->oferta = false;
            $producto->precio_ante = null;
            $producto->fecha_lim_desc = null;
        }else{
            $producto->oferta = true;
            $descuento = $ProductoRequest->precio - $ProductoRequest->descuento;
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
                $cloudinary = new UploadApi();
                $resultado=$cloudinary->upload($img->getRealPath(),["folder"=>"Productos"]);
                $url = $resultado["secure_url"];
                $imagen = new Image;
                $imagen->url = $url;        
                $producto->images()->save($imagen);
            }
        }

        //operador terneario 
        // $valor = ($ProductoRequest->hasFile("imagen")) ? "tiene imagen" : "no tiene imagen";
        return view("moduloVendedores.homeVendedor",["nameView"=> "Home"]);
    }
    
}
