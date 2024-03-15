<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('moduloInicio.home', [
            'nameView' => 'Home',
            'products' => [
                'product' => [
                    'name' => 'mouse'
,                    'precio' => '500.00',
                    'description' => 'cosas, muchas cosas que no megustas decir cuales son sinduda alguna no me gusta',
                    'img' => 'https://picsum.photos/200/300',
                    'descuento' => '200.00',
                    'tag' => '1° MÁS VENDIDO',
                    'categoria' => [
                        'tecnologia',
                        'gamming',
                        'accesorios Pc'
                    ]
                ],
            ],
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
