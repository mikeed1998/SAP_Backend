<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal_fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sucursal')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('municipio')->nullable();
            $table->text('foto')->nullable();
            $table->foreign('sucursal')->references('id')->on('z_sucursals')->onDelete('cascade');
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
        Schema::dropIfExists('sucursal_fotos');
    }
}
