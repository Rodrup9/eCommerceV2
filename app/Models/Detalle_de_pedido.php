<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_de_pedido extends Model
{
    use HasFactory;
    protected $primaryKey = 'detalle_id';
    
    public function pedidos(){
        return $this->hasMany('App\Models\Producto','pedido_id');
    }

    public function productos(){
        return $this->hasMany('App\Models\Producto','producto_id');
    }
}
