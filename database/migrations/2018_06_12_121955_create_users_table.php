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
            $table->string('cpf')->unique();
            $table->string('name');
            $table->string('endereco');
            $table->string('email');
            $table->string('password');
            $table->integer('id_profissao')->unsigned();
            $table->foreign('id_profissao')->references('id')->on('profissao');
            $table->integer('id_perfil')->unsigned();
            $table->foreign('id_perfil')->references('id')->on('perfil');
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
