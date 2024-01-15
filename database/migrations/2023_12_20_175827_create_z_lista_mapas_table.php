<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZListaMapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_lista_mapas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estado');
            $table->text('sucursal')->nullable();
            $table->foreign('estado')->references('id_estado')->on('z_mapas')->onDelete('cascade');
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
        Schema::dropIfExists('z_lista_mapas');
    }
}
