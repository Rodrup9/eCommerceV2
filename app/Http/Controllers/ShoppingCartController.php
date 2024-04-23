<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use Carbon\Carbon;
use DateTime;
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

    function confirmData(Request $request){
        $user = Auth::user();
        $data = $request->all();
        $show = json_decode($data['data']);
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
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
            'user' => $user,
            'show' => $show,
            'imag' => $img
        ]);
    }

    function pay(Request $request){
        $user = Auth::user();
        $data = $request->all();
        $descripcion = '';
        foreach($data as $key => $item){
            if($key != "_token"){
                $consulta = Producto::where('producto_id', '=', $key)->get();
                $consulta[0]->cantidad = $consulta[0]->cantidad - $item;
                $descripcion .= $consulta[0]->nombre . ', ';
                $consulta[0]->save();
            }
        }
        $fechaActual = new DateTime();
        $fechaFormateada = $fechaActual->format('Y-m-d');

        $insert = new Pedido;
        $insert->user_id = $user->id;
        $insert->descripcion = $descripcion;
        $insert->fecha_de_pedido = $fechaFormateada;
        $insert->fecha_de_entrega = Carbon::now()->addDays(7)->toDateTimeString();
        $insert->save();
        return redirect()->route('historialShopping');
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
            $consulta = Pedido::where('user_id', '=', $user->id)->get();
            return view('moduloShoppingCart.historialShopping', [
                'nameView' => 'Historial',
                'messegeStatus' => 'Compra realizada con éxito',
                'pedidos' => $consulta,
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
