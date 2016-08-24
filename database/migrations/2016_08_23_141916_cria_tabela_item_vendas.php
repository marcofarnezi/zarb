<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaItemVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendas_id')->unsigned();
            $table->foreign('vendas_id')
                  ->references('id')->on('vendas');
            $table->integer('produtos_id')->unsigned();
            $table->foreign('produtos_id')
                  ->references('id')->on('produtos');
            $table->integer('quantidade');
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
        Schema::drop('item_vendas');
    }
}
