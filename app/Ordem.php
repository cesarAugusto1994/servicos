<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    protected $table = 'ordens';

    protected $dates = ['data_encordoamento'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

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

}
