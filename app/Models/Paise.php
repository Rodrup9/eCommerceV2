<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paise extends Model
{
    use HasFactory;
    protected $primaryKey = 'pais_id';

    //Relación one-to-many
    public function estados() {
        return $this->hasMany('App\Models\Estado','pais_id');
    }
}
