<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEcommerceController extends Controller
{
    function index(){
        return view('moduloAdminEcommerce.homeAdminEcommerce', 
        [
            'nameView' => 'AdminEcomerce'
        ]);
    }

    function lista($lista){
        return view('moduloAdminEcommerce.listaAdminEcommerce',
        [
            'nameView' => 'Lista',
            'typeList' => $lista
        ]);
    }

    function detalles($data){
        return view('moduloAdminEcommerce.detallesListAdminEcommerce',
        [
            'nameView' => 'Detalles',
            'nameDetalle' => $data
        ]);
    }

    public function perfil() {
        return view('sesion.perfil', [
            'nameView' => 'Perfil'
        ]);
    }
}
