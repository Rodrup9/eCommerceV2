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
        return view('moduloAdminEcommerce.homeAdminEcommerce', 
        [
            'nameView' => 'AdminEcomerce'
        ]);
    }

    public function lista($lista){
        
        $users = User::whereHas('type_users', function($query) use($lista){
            $query->where('nombre',$lista);
        })->get();
        return view('moduloAdminEcommerce.listaAdminEcommerce',
        [
            'nameView' => 'Lista',
            'typeList' => $lista,
            'usuarios' => $users,
        ]);
    }

    public function detalles($data){

        $user = User::find($data)->first();


        return view('moduloAdminEcommerce.detallesListAdminEcommerce',
        [
            'nameView' => 'Detalles',
            'nameDetalle' => $user
        ]);
    }

    public function eliminarUser($user){
        $userElim = User::find($user);
        $userElim->delete();
        return redirect()->route('homeAdminEcommerce');
    }
}
