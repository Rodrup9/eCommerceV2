<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    function index(){
        return view('moduloShoppingCart.shoppingCart', [
            'nameView' => 'shoppingCart'
        ]);
    }

    function confirmData(Request $request){
        $user = Auth::user();
        $data = $request->all();
        $show = json_decode($data['data']);
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
            'show' => $show
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
        $status = '1';
        if($status == '1'){
            $consulta = Pedido::where('user_id', '=', $user->id)->get();
            return view('moduloShoppingCart.historialShopping', [
                'nameView' => 'Historial',
                'messegeStatus' => 'Compra realizada con éxito',
                'pedidos' => $consulta
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
