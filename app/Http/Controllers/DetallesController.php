<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DetallesController extends Controller
{
    function index(Request $request){
        $id = $request->route('id');
        $producto = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.producto_id', $id)->where('images.image_id', $id)->first();
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->get();
        return view('modulodetalleproducto.producto', [
            'nameView' => 'Producto',
            'productoD' => $producto,
            'products' => $consulta,
            'sectionS' => [
                'Mas productos del vendedor' => [
                    'url' => 'recientes'
                ],
                'Sugerencias' => [
                    'url' => 'recientes'
                ],
            ],
        ]);

    }
}
