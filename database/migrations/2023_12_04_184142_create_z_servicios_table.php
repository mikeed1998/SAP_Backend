<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('descripcion2')->nullable();
            $table->integer('orden')->nullable();
            $table->text('portada')->nullable();
            $table->text('imagen')->nullable();
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
        Schema::dropIfExists('z_servicios');
    }
}
