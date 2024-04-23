<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Image;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->get();

        $ofertasEspeciales = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->join('subcategorias', 'productos.subcategoria_id', '=', 'subcategorias.subcategoria_id')
            ->orderBy('oferta', 'desc')
            ->take(5)
            ->get();
        
        $position = 1;
        foreach($ofertasEspeciales as $item){
            $item['position'] = "oferta" . $position++;
        }
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

        $categorias = Categoria::with("subcategorias")->get();

        return view('moduloInicio.home', [
            'nameView' => 'Home',
            'products' => $consulta,
            'ofertasEspeciales' => $ofertasEspeciales,
            'categorias' => $categorias,
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

    public function updateOfertas(Request $request){
        $ofertasEspeciales = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
            ->join('subcategorias', 'productos.subcategoria_id', '=', 'subcategorias.subcategoria_id')
            ->orderBy('oferta', 'desc')
            ->take(5)
            ->get();
        
        $position = 1;
        foreach($ofertasEspeciales as $item){
            $item['position'] = "oferta" . $position++;
        }
        return response()->json($ofertasEspeciales);
    }

    public function updateSlidersRecientes(Request $request){
        $num = $request->input('numeros');
        if($num){
            $num = json_decode($num);
            $num = array_reverse($num);
            $data = [];
            foreach($num as $item){
                $consulta = Producto::join('images', 'productos.producto_id', '=', 'images.image_id')
                    ->where('productos.producto_id', $item)
                    ->get();
                if($consulta->isNotEmpty()){
                    $data[] = $consulta;
                }
            }
        }
        if(!$data){
            $data = [null];
        }
        return response()->json($data);
    }

    public function updateSliderSugerencias(Request $request){
        

        return response()->json();
    }

    public function updateSliderTendencias(Request $request){
        return response()->json();
    }

    public function updateSliderDescuentos(Request $request){

        return response()->json();
    }
}
