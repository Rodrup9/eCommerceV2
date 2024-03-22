<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->get();

        $ofertasEspeciales = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->orderBy('oferta', 'desc')
            ->take(5)
            ->get();
        /*
        $recientes = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.producto_id, $recientes') "cookies"
            ->take(15)
            ->get();
        $sugerencias = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.producto_id, $sugerencias') "cookies"
            ->take(15)
            ->get();
        $tendencias = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->join('detalle_de_pedidos', 'productos.producto_id', '=', 'detalle_de_pedido.producto_id')
            ->orderBy('')
            ->take(15)
            ->get();
        $descuentos = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->where('productos.oferta, '>' ,$descuentoMinimo')
            ->take(15)
            ->get();
        */
        return view('moduloInicio.home', [
            'nameView' => 'Home',
            'products' => $consulta,
            'ofertasEspeciales' => $ofertasEspeciales,
            'sectionS' => [
                'Busquedas recientes' => [
                    'url' => 'null/recientes'
                ],
                'Sugerencias' => [
                    'url' => 'null/sugerencias'
                ],
                'Tendencias' => [
                    'url' => 'null/tendencias'
                ],
                'Mayores descuentos' => [
                    'url' => 'null/descuentos'
                ]
            ]
        ]);

        /* Borrador params
        [
            'ofertas' => $ofertas,
            'sugerencias' => $sugerencias,
            'tendencias' => $tendencias,
            'recientes' => $recientes,
        ]
        */
    }
}
