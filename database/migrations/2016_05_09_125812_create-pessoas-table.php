<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome')->unique();
            $table->string('sexo')->nullable();
            $table->string('nascimento')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('email')->nullable();
            $table->string('telfixo')->nullable();
            $table->string('telcelular')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->integer('id_programa')->unsigned();
            $table->foreign('id_programa')->references('id')->on('programas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoas');
    }
}
