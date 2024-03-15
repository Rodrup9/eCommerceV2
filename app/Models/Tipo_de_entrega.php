<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_de_entrega extends Model
{
    use HasFactory;

    //one-to-many
    public function pedidos() {
        return $this->hasMany('App\Models\Pedido');
    }
}
