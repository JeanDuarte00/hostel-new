<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemQuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_quartos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quarto_id')->unsigned();
            $table->foreign('quarto_id')
                ->references('id')
                ->on('quartos')
                ->onDelete('cascade');
            $table->string('imagem',1000);    
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
        Schema::dropIfExists('imagem_quartos');
    }
}
