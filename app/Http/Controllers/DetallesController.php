<?php

namespace App\Http\Controllers;

use App\Models\Calidad_producto;
use App\Models\Comentario;
use App\Models\Image;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DetallesController extends Controller
{
    function index(Request $request){
        $user = Auth::user();
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
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view('modulodetalleproducto.producto', [
            'nameView' => 'Producto',
            'user' => $user,
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
            ], 'imag' => $img
        ]);

    }

    public function updateComentarios(Request $request){
        $id = $request->route('id');
        $consulta = Comentario::where('producto_id', $id)->get();
        for ($i = 0; $i < count($consulta); $i++){
            $consulta2 = User::find($consulta[$i]['user_id']);
            $consulta[$i]['user'] = $consulta2['nombre'];
        }
        return response()->json($consulta);
    }

    public function addComentarioUser(Request $request){
        $data = $request->all();
        $insert = Comentario::create($data);
        $consulta = Calidad_producto::where('producto_id', '=' , $data['producto_id'])->first();
        if ($consulta){
            $newSuma = $consulta->sumaCalificacion + floatval($data['calificacion']);
            $newTotal = $consulta->total_vendidas + 1;
            $newMedia = $newSuma / $newTotal;
            $consulta->media = $newMedia;
            $consulta->sumaCalificacion = $newSuma;
            $consulta->total_vendidas = $newTotal;
            $consulta->save();
        }else{
            $data2 = [
                'producto_id' => $data['producto_id'],
                'media' => floatval($data['calificacion']),
                'sumaCalificacion' => $data['calificacion'],
                'total_vendidas' => 1
            ];
            $insert2 = Calidad_producto::create($data2);
        }
        return response()->json(['mensaje' => 'hola']);
    }
}
