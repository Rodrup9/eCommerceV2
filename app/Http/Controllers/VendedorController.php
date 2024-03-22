<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendedorController extends Controller
{
    public function pedidos(): View{
        return view("moduloVendedores.listaPedido",
        ['nameView' => 'Pedidos']);
    }

    
    public function index(): View{
        return view("moduloVendedores.homeVendedor",
        ['nameView' => 'Home']);
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
        $datosProducto = Producto::where("producto_id",$producto)->first();
        return view("moduloVendedores.detallesProducto",
            ["datosProducto" => $datosProducto,
            "nameView"=>"detalles produc"]);
    }
}
