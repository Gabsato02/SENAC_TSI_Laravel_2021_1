<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{

    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->integer('preco');
            $table->string('fabricante');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
