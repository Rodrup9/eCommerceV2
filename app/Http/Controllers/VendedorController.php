<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class VendedorController extends Controller
{
    public function pedidos(): View
    {

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

        return view(
            "moduloVendedores.listaPedido",
            ['nameView' => 'Pedidos', 'imag' => $img]
        );
    }


    public function index(): View
    {

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

        return view(
            "moduloVendedores.homeVendedor",
            [
                'nameView' => 'Home',
                'imag' => $img
            ]
        );
    }

    public function detalles()
    {

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

        return view(
            "moduloVendedores.detallesPedido",
            ['nameView' => 'detalles pedido',
            'imag' => $img]
        );
    }

    public function listaProductos()
    {
        $productos = Producto::all();
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view(
            "moduloVendedores.listaProductos",
            [
                "productos" => $productos,
                "nameView" => "lista produc",
                'imag' => $img
            ]
        );
    }

    public function detallesProducto($producto)
    {
        $datosProducto = Producto::findOr($producto);
        $subCat = $datosProducto->Subcategoria;
        $imagesProducto = $datosProducto->images;
        $categorias =  Categoria::with("subcategorias")->get();
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view(
            "moduloVendedores.detallesProducto",
            [
                "Producto" => $datosProducto,
                "Imagenes" => $imagesProducto,
                "categorias" => $categorias,
                "subcategoria" => $subCat,
                "nameView" => "detalles produc",
                'imag' => $img
            ]
        );
    }
}
