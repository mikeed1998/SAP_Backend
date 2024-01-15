<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_f_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria');
            $table->string('nombre')->nullable();
            $table->double('precio', 8, 2)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('existencias')->nullable();
            $table->string('presentacion')->nullable();
            $table->text('imagen')->nullable();
            $table->foreign('categoria')->references('id')->on('p_f_categoria_productos')->onDelete('cascade');
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
        Schema::dropIfExists('p_f_productos');
    }
}
