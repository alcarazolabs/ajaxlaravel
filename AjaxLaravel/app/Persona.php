<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function scopeBuscarpor($query, $tipo, $buscar){
        if( ($tipo) && ($buscar)){
            return $query->where($tipo,'like',"%$buscar%");
        }
    }
}
