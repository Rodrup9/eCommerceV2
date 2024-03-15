<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    function index(){
        $url = $_SERVER['REQUEST_URI'];
        return view('moduloShoppingCart.shoppingCart', [
            'nameView' => 'shoppingCart',
            'urlPage' => $url,
            'user' => 'h',
            'cart' => [
                [
                    'producto' => 'mouse',
                    'img' => 'https://picsum.photos/200/300' ,
                    'cantidad' => '1',
                    'precio' => '$200'
                ],
                [
                    'producto' => 'coche',
                    'img' => 'https://picsum.photos/200/300' ,
                    'cantidad' => '1',
                    'precio' => '$100'
                ],
            ]
        ]);
    }

    function confirmData(){
        return view('moduloShoppingCart.confirmDataCart', [
            'nameView' => 'shoppingCart',
        ]);
    }

    function historialShopping(){

        $status = '1';
        if($status == '1'){
            return view('moduloShoppingCart.historialShopping', [
                'nameView' => 'Historial',
                'messegeStatus' => 'Compra realizada con éxito'
            ]);
        }
        elseif ($status == '0'){
            return view('moduloShoppingCart.shoppingCart', [
                'nameView' => 'shoppingCart',
                'messegeStatus' => 'Ocurrio un problema al confirmar la compra'
            ]);
        }
        
    }
}
