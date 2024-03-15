<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    function index($filter){
        
        return view('moduloInicio.catalogo', [
            'nameView' => 'Catalogo',
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
        ]);
    }
}
