<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_pedido extends Model
{
    use HasFactory;
    protected $primaryKey = 'estado_pedido_id';

    //one-to-many
    public function pedidos() {
        return $this->hasMany('App\Models\Pedido','estado_pedido_id');
    }
}
