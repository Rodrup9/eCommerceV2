<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    function index(){
        return view('moduloShoppingCart.shoppingCart', [
            'nameView' => 'shoppingCart'
        ]);
    }

    function confirmData(){
        $user = Auth::user();
/*
        return view('sesion.perfil', [
            'nameView' => 'Perfil',
            'nombre' => $user->nombre,
            'apellido_pa' => $user->apellido_pa,
            'apellido_ma' => $user->apellido_ma,
            'correo' => $user->email,
            'username' => $user->nombre_de_usuario
        ]);*/
        return view('moduloShoppingCart.confirmDataCart', [
            'nameView' => 'shoppingCart',
            'user' => $user
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
