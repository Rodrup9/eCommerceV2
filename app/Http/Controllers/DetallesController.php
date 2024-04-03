<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Image;
use App\Models\Producto;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DetallesController extends Controller
{
    function index(Request $request){
        $id = $request->route('id');
        $producto = Producto::join('images', 'productos.producto_id', '=', 'images.imageable_id')
            ->where('productos.producto_id', $id)->where('images.imageable_id', $id)->first();
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->get();

        $producto2 = Producto::where('producto_id', $id)->first();
        $consultaImgs = Image::where('imageable_id', $id)->get();
        $producto = $producto->toArray();
        $producto['urls'] = [];
        for($i = 0; $i < count($consultaImgs); $i++){
            $producto['urls'][] = $consultaImgs[$i]['url'];
        }
        return view('modulodetalleproducto.producto', [
            'nameView' => 'Producto',
            'productoD' => $producto,
            'products' => $consulta,
            'img' => $consultaImgs,
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

    public function updateComentarios(Request $request){
        $id = $request->route('id');
        $consulta = Comentario::where('producto_id', $id)->get();
        return response()->json($consulta);
    }

    public function addComentarioUser(Request $request){
        $data = $request->all(); // Obtener todos los datos del cuerpo de la solicitud en formato JSON
        $insert = Comentario::create($data);
        return response()->json(['mensaje' => 'Datos insertados correctamente']);
    }
}
