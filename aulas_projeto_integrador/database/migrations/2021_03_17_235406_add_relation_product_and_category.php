<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationProductAndCategory extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Basta apenas colocar o nomedamodel_id e a relação já será feita
            $table->integer('category_id');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Criando o rollback
            $table->dropColumn('category_id');
        });
    }
}
