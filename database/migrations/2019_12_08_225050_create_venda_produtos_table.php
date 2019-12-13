<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('venda_id');
            $table->unsignedBigInteger('produto_id');
            $table->double('quantidade', 8, 2);
            $table->decimal('valorUnitario', 12, 2);
            $table->timestamps();
        });

        Schema::table('venda_produtos', function($table) {
            $table->foreign('produto_id')
                ->references('id')->on('produtos')
                ->onDelete('cascade');
            $table->foreign('venda_id')
                ->references('id')->on('vendas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda_produtos');
    }
}
