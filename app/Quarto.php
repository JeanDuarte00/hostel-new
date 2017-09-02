<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $table = 'quartos';

    protected $fillable = ['id','nome', 'valor','descricao_simples','descricao_completa','qtd_criancas', 'qtd_adultos'];
    

    public function imagens()
    {
        return $this->hasMany('App\imagem_quarto');
    }

    public function reservas()
    {
        return $this->hasMany('App\Reservas');
    }


}
