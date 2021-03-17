<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nome');
            $table->text('descricao');
            $table->decimal('valor', 6, 2)->default(0);
            $table->enum('ativo', ['S', 'N'])->default('S');
            $table->enum('capa', ['S', 'N'])->default('S');
            $table->integer('estoque');
            $table->float('peso');
            $table->integer('altura');
            $table->integer('largura');
            $table->integer('comprimento');
            $table->integer('estoque');


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
        Schema::dropIfExists('produtos');
    }
}
