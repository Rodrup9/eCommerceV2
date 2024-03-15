<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DetallesController extends Controller
{
    function index(){
        return view('modulodetalleproducto.producto', [
            'nameView' => 'Home',
            'products' => [
                'product' => [
                    'name' => 'mouse'
,                    'precio' => '51000.00',
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
                'Mas productos del vendedor' => [
                    'url' => 'recientes'
                ],
            ],
            'sectiosur' => [
                'Sugerencias' => [
                    'url' => 'recientes'
                ],
            ]
        ]);

    }
}
