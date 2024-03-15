<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_de_pedido extends Model
{
    use HasFactory;

    
    public function pedido(){
        return $this->hasMany('App\Models\Producto');
    }

    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }
}
