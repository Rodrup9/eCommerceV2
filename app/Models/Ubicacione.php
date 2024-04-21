<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacione extends Model
{
    use HasFactory;

    protected $primaryKey = 'ubicacion_id';

    public function pedido(){
        return $this->hasOne('App\Models\Pedido','ubicacion_id');
    }


}
