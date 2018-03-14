<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function cordas()
    {
        return $this->belongsTo(Cordas::class, 'corda_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
