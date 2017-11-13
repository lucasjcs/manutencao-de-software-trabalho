<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("produto_id")->unsigned();
            $table->integer("fornecedor_id")->unsigned();
            $table->integer("quantidade")->unsigned();
            $table->foreign('produto_id')
                ->references('id')->on('produtos')
                ->onDelete('cascade');

            $table->foreign('fornecedor_id')
                ->references('id')->on('fornecedors')
                ->onDelete('cascade');

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
        Schema::dropIfExists('vendas');
    }
}
