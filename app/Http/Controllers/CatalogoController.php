<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CatalogoController extends Controller
{
    function index(Request $request){

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

        $dataEntry = $request->all();
        $dataEntry = $dataEntry['searching'];
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.nombre', 'like', "%{$dataEntry}%")
            ->get();
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta,
            'imag' => $img
        ]);
    }

    function search(Request $request){

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

        $dataEntry = $request->all();
        $dataEntry = $dataEntry['searching'];
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.nombre', 'like' , "%{$dataEntry}%")
            ->get();
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta, 'imag' => $img
        ]);
    }
}
