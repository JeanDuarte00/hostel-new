<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $fillable = ['quarto_id', 'data_inicio','data_fim'];

    public function quarto()
    {
        return $this->belongsTo('App\Quarto');
    }
}
