<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Perfil;
use App\Http\Requests\StorePassword;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminEcommerceController extends Controller
{
    function index(){
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view('moduloAdminEcommerce.homeAdminEcommerce', 
        [
            'nameView' => 'AdminEcomerce',
            'imag' => $img
        ]);
    }

    public function lista($lista){
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        $users = User::whereHas('type_users', function($query) use($lista){
            $query->where('nombre',$lista);
        })->get();
        return view('moduloAdminEcommerce.listaAdminEcommerce',
        [
            'nameView' => 'Lista',
            'typeList' => $lista,
            'usuarios' => $users,
            'imag' => $img
        ]);
    }

    public function detalles($data){
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        $user = User::find($data)->first();
        return view('moduloAdminEcommerce.detallesListAdminEcommerce',
        [
            'nameView' => 'Detalles',
            'nameDetalle' => $user,
            'imag' => $img
        ]);
    }



    public function eliminarUser($user){

        $deleteUser = User::find($user);
        $deleteUser->delete();

        return redirect()->route('homeAdminEcommerce');

    }



    public function producVendedor(){
       // $vendedoresProduc = User::with([
        //         'type_users' => function($query){
        //             $query->where('nombre','Cliente');
        //         },
        //     'productos',
        // $vendedoresProduc = User::whereHas('type_users', function ($query) {
        //     $query->where('nombre', 'Vendedor');
        //     })->with('productos',function($query2){
        //         $query2->with('images');
        //     })->get();

        $vendedoresProduc = User::whereHas('type_users', function ($query) {
            $query->where('nombre', 'Vendedor');
            })->withCount('productos')->get();
            
        return view('moduloAdminEcommerce.productosVendedor',[
            'productos'=>$vendedoresProduc,
            'nameView' => 'Productos de vendedores'
        ]);
    }


    public function detallesProdVen($producto){

        // $vendedorProduc = User::find($producto)->whereHas('type_users', function ($query) {
        //     $query->where('nombre', 'Vendedor');
        //     })->with('productos.images');

        $vendedorProduc = User::where('id',$producto)->with('productos.images')->get();

            return view('moduloAdminEcommerce.detalleProducVendedor',[
                'nameView' => 'detalles productos',
                'productos' => $vendedorProduc
            ]);

    }

    // public function reporteProduct(){
    //     return view('moduloVendedores.reporte',[
    //         'nameView' => 'reporte'
    //     ]);
    // }

}
