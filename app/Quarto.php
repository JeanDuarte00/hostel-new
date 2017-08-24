<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $table = 'quartos';

    protected $fillable = ['nome', 'valor','descricao_simples','descricao_completa'];

    public function imagens()
    {
        return $this->hasMany('App\imagem_quarto');
    }


}
