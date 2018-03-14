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

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
