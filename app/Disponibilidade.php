<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quarto;

class Disponibilidade extends Model
{
    protected $fillable = ['id','quarto_id','valor','data_inicio','data_fim'];

    public function quarto()
    {
        return $this->belongsTo('app\Quarto');
    }
}
