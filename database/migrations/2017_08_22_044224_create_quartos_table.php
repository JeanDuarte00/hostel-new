<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quartos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->decimal('valor', 5, 2);
            $table->string('descricao_simples');
            $table->string('descricao_completa');
            $table->integer('qtd_adultos')->nullable();
            $table->integer('qtd_criancas')->nullable();
            $table->integer('ativo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quartos');
    }
}
