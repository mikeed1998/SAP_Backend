<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_sucursals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado')->nullable();
            $table->integer('municipio')->nullable();
            $table->text('sucursal')->nullable();
            $table->text('coordX')->nullable();
            $table->text('coordY')->nullable();
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
        Schema::dropIfExists('z_sucursals');
    }
}
