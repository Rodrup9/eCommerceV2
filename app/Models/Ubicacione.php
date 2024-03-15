<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacione extends Model
{
    use HasFactory;

    //Relación many-to-one
    public function estado() {
        return $this->belongsTo('App\Models\Estado');
    }


}
