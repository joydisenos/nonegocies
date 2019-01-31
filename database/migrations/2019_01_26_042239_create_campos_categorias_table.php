<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamposCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campos_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id');
            $table->string('nombre');
            $table->string('clase')->nullable();
            $table->integer('tipo')->default(1);
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
        Schema::dropIfExists('campos_categorias');
    }
}
