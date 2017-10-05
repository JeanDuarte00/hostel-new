<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagem_quarto extends Model
{
    protected $fillable = ['quarto_id','imagem'];

    public function quarto()
    {
        return $this->belongsTo('app\Quarto');
    }
}
