<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function modelos()
    {
        return $this->hasMany(Modelo::class, 'marca_id');
    }
}
