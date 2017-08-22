<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponobilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponobilidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quarto_id')->unsigned();
            $table->foreign('quarto_id')
                ->references('id')
                ->on('quartos')
                ->onDelete('cascade');
            $table->decimal('valor',5,2);
            $table->date('data_inicio');
            $table->date('data_fim');
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
        Schema::dropIfExists('disponobilidades');
    }
}
