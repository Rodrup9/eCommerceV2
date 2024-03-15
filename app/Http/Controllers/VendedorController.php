<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VendedorController extends Controller
{
    public function pedidos(): View{
        return view("moduloVendedores.listaPedido",['nameView' => 'Pedidos']);
    }
    public function index(): View{
        return view("moduloVendedores.homeVendedor",['nameView' => 'Home']);
    }

    public function detalles(){
        return view("moduloVendedores.detallesPedido",['nameView' => 'detalles']);
    }
}
