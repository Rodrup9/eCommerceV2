<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    function index(Request $request){
        $dataEntry = $request->all();
        $dataEntry = $dataEntry['searching'];
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.nombre', 'like', "%{$dataEntry}%")
            ->get();
        $categorias = Categoria::with("subcategorias")->get();

        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta,
            'categorias' => $categorias,
        ]);
    }

    function search(Request $request){
        $dataEntry = $request->all();
        $dataEntry = $dataEntry['searching'];
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.nombre', 'like' , "%{$dataEntry}%")
            ->get();

        $categorias = Categoria::with("subcategorias")->get();
        
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta,
            'categorias' => $categorias,
        ]);
    }

    function searchCategoria(Request $request, $id){
        
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.subcategoria_id', '=' , $id)
            ->get();

        $categorias = Categoria::with("subcategorias")->get();
        if(!$categorias){
            $categorias = ['No se encontro nada'];
        }
        
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta,
            'categorias' => $categorias,
        ]);
    }
}
