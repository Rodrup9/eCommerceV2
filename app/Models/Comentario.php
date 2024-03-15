<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function productos() {
        return $this->hasMany('App\Models\Producto','prducto_id', 'producto_id');
    }
}
