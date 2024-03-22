<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $consulta = Producto::all();
        $img = Image::all();
        $longConsult = count($consulta);
        for($i = 0; $i <= 4; $i++ ){
            $consulta[$i]['url'] = $img[$i]["url"];
        }
        return view('moduloInicio.home', [
            'nameView' => 'Home',
            'products' => $consulta,
            'sectionS' => [
                'Busquedas recientes' => [
                    'url' => 'recientes'
                ],
                'Sugerencias' => [
                    'url' => 'sugerencias'
                ],
                'Tendencias' => [
                    'url' => 'tendencias'
                ],
                'Mayores descuentos' => [
                    'url' => 'descuentos'
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
