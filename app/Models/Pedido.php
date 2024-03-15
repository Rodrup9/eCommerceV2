<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //many-to-one
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //many-to-one
    public function ubicacion(){
        return $this->belongsTo('App\Models\Ubicacione');
    }

    //many-to-one
    public function estado_pedido(){
        return $this->belongsTo('App\Models\Estado_pedido');
    }

    //many-to-one
    public function tipo_de_entrega(){
        return $this->belongsTo('App\Models\Tipo_de_entrega');
    }
    
}
