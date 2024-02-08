<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFNecesidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_f_necesidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo_sector')->nullable();
            $table->text('sector')->nullable();
            $table->text('necesidades')->nullable();
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
        Schema::dropIfExists('p_f_necesidades');
    }
}
