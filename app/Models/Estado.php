<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $primaryKey = 'estado_id';

    //Relación many-to-one
    public function paise() {
        return $this->belongsTo('App\Models\Paise','pais_id');
    }

    //Relación one-to-many
    public function ubicaciones() {
        return $this->hasMany('App\Models\Ubicacione','estado_id');
    }
}
