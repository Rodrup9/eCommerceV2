<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    function index(){
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view('moduloShoppingCart.shoppingCart', [
            'nameView' => 'shoppingCart', 'imag' => $img
        ]);
    }

    function confirmData(){
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view('moduloShoppingCart.confirmDataCart', [
            'nameView' => 'shoppingCart',
            'user' => $user,
            'imag' => $img
        ]);
    }

    function historialShopping(){

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        $status = '1';
        if($status == '1'){
            return view('moduloShoppingCart.historialShopping', [
                'nameView' => 'Historial',
                'messegeStatus' => 'Compra realizada con éxito',
                'imag' => $img
            ]);
        }
        elseif ($status == '0'){
            return view('moduloShoppingCart.shoppingCart', [
                'nameView' => 'shoppingCart',
                'messegeStatus' => 'Ocurrio un problema al confirmar la compra',
                'imag' => $img
            ]);
        }
        
    }

}
