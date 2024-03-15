<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use App\Http\Requests\StoreProductoRequest;
use App\Models\Image;
use App\Models\Producto;

class AgregarProductoController extends Controller{

    public function NuevoProducto(): View{
        return view("moduloVendedores.agregarProduc",["nameView"=> "agregarProducto"]);
    }

     public function AgregarProducto(StoreProductoRequest $ProductoRequest){
        $producto = new Producto;
        $producto->nombre = $ProductoRequest->nombre;
        $producto->descripcion = $ProductoRequest->descripcion;
        $producto->precio = $ProductoRequest->precio;
        $producto->cantidad = $ProductoRequest->cantidad;
        $producto->oferta = true;
        $producto->precio_ante = $ProductoRequest->precio;
        $producto->save();
        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dlxpr11ok', 
                'api_key' => '684419351949932', 
                'api_secret' => 'P2F1tpvLqz6681avsE0oxPQeBV0'],
            'url' => [
                'secure' => true]]);
        
        $cloudinary = new UploadApi();
        $resultado=$cloudinary->upload($ProductoRequest->file("imagen")->getRealPath(),["folder"=>"Productos"]);
        $url = $resultado["secure_url"];

        $imagen = new Image;
        $imagen->url = $url;        
        $producto->images()->save($imagen);

        return view("moduloVendedores.homeVendedor",["nameView"=> "Home"]);

    }
    
}
