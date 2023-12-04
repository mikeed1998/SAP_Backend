<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_vacantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('orden')->nullable();
            $table->text('portada')->nullable();
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
        Schema::dropIfExists('z_vacantes');
    }
}
