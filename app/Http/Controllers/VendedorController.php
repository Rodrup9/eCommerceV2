<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VendedorController extends Controller
{
    public function pedidos(): View{
        return view("moduloVendedores.listaPedido",
        ['nameView' => 'Pedidos']);
    }

    
    public function index(): View{

    $user = Auth::user();


        return view("moduloVendedores.homeVendedor",
        [   'nameView' => 'Home'
        ]);
    }

    public function detalles(){
        return view("moduloVendedores.detallesPedido",
        ['nameView' => 'detalles pedido']);
    }

    public function listaProductos(){
        $productos = Producto::all();
        return view("moduloVendedores.listaProductos",
            ["productos" => $productos,
            "nameView"=> "lista produc"]);
    }

    public function detallesProducto($producto){
        $datosProducto = Producto::findOr($producto);
        $subCat = $datosProducto->Subcategoria;
        $imagesProducto = $datosProducto->images;
        $categorias =  Categoria::with("subcategorias")->get();
        return view("moduloVendedores.detallesProducto",
            ["Producto" => $datosProducto,
            "Imagenes" => $imagesProducto,
            "categorias" =>$categorias,
            "subcategoria" => $subCat,
            "nameView"=>"detalles produc"]);
    }
}
