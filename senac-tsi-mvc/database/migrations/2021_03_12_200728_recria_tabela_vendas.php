<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecriaTabelaVendas extends Migration
{
    public function up()
    {
        Schema::create('Vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_da_venda');
            $table->double('valor', 10, 2);
            // Implementação de Foreign Key
            $table->foreignId('funcionario_id')->constrained('Funcionario')->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained('Clientes')->onDelete('cascade');

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    public function down()
    {
        Schema::dropIfExists('Vendas');
    }
}
