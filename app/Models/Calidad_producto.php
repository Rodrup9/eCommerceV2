<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidad_producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'calidad_producto_id';

    protected $fillable = [
        'producto_id',
        'media',
        'sumaCalificacion',
        'total_vendidas'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
