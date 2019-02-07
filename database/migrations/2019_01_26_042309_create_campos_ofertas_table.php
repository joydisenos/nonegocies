<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamposOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campos_ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oferta_id');
            $table->string('nombre');
            $table->string('valor')->nullable();
            $table->float('numero')->nullable();
            $table->float('pp1')->nullable();
            $table->float('pp2')->nullable();
            $table->float('pp3')->nullable();
            $table->float('ep1')->nullable();
            $table->float('ep2')->nullable();
            $table->float('ep3')->nullable();
            $table->float('precio_tarifa')->nullable();
            $table->float('precio_fijo')->nullable();
            $table->string('clase')->nullable();
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
        Schema::dropIfExists('campos_ofertas');
    }
}
