<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('vendas');
        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor', 9, 2);
            $table->decimal('comissao', 9, 2);
            $table->unsignedBigInteger('vendedor_id');
            $table->foreign('vendedor_id')
                    ->references('id')
                    ->on('vendedors')
                    ->onDelete('CASCADE');
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
