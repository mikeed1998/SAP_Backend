<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFPresentacionesProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_f_presentaciones_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('producto');
            $table->string("presentacion")->nullable();
            $table->foreign('producto')->references('id')->on('p_f_productos')->onDelete('cascade');
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
        Schema::dropIfExists('p_f_presentaciones_productos');
    }
}
