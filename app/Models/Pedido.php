<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $primaryKey = 'pedido_id';

    //many-to-one
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //many-to-one
    public function ubicacion(){
        return $this->belongsTo('App\Models\Ubicacione','ubicacion_id');
    }

    //many-to-one
    public function estado_pedido(){
        return $this->belongsTo('App\Models\Estado_pedido','estado_pedido_id');
    }

    //many-to-one
    public function tipo_de_entrega(){
        return $this->belongsTo('App\Models\Tipo_de_entrega','tipo_de_entrega_id');
    }

    public function detalle_de_pedido(){
        return $this->belongsTo(Detalle_de_pedido::class,'pedido_id');
    }
    
}
