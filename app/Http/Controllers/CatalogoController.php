<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta
        ]);
    }

    function search(Request $request){
        $dataEntry = $request->all();
        $dataEntry = $dataEntry['searching'];
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.nombre', 'like' , "%{$dataEntry}%")
            ->get();
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta
        ]);
    }
}
