<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_endereco',8);
            $table->foreign('id_endereco')
                ->references('cep')
                ->on('enderecos');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf');
            $table->string('rg');
            $table->string('telefone');
            $table->date('data_nascimento');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
