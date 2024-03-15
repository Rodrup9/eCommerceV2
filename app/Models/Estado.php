<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    //Relación many-to-one
    public function paise() {
        return $this->belongsTo('App\Models\Paise');
    }

    //Relación one-to-many
    public function ubicaciones() {
        return $this->hasMany('App\Models\Ubicacione');
    }
}
