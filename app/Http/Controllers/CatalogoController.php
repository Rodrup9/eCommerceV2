<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    function index($id, $filter){
        $recientes = 1;
        $descuentoMinimo = 0;
        $sugerencias = 1;
        if ($filter == 'ofertasEspeciales'){
            $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                ->orderBy('oferta', 'desc')
                ->take(30)
                ->get();
        }elseif($filter == 'sugerencias'){
            $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                ->where('productos.producto_id', $sugerencias)
                ->take(15)
                ->get();
        }elseif($filter == 'recientes'){
            $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                ->where('productos.producto_id', $recientes)
                ->take(30)
                ->get();
        }elseif($filter == 'tendencias'){
            $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                ->join('detalle_de_pedidos', 'productos.producto_id', '=', 'detalle_de_pedido.producto_id')
                ->orderBy('')
                ->take(30)
                ->get();
        }
        elseif($filter == 'descuentos'){
            $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                ->where('productos.oferta', '>' , $descuentoMinimo)
                ->take(30)
                ->get();
        }
        elseif($id){
            $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                ->where('productos.producto_id', $recientes)
                ->take(30)
                ->get();
        }
        else{
            return redirect('/home');
        }
        
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
            'consulta' => $consulta
        ]);
    }
}
