<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'user_id',
        'descripcion',
        'calificacion'
    ];

    protected $primaryKey = 'comentario_id';

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function producto() {
        return $this->belongsTo('App\Models\Producto','producto_id');
    }
}
