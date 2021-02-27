<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Funcionario', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /* os campos acima são automáticos, os abaixo são declarados conforme o
            que você deseja na sua tabela */
            $table->string('nome');
            $table->string('endereco');
            $table->string('email');
            $table->bigInteger('telefone');
            // codificando os caracteres
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Funcionario');
    }
}
