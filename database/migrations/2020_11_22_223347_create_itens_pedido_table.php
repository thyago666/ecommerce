<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_pedido', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qtd');
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
        Schema::dropIfExists('itens_pedido');
    }
}
