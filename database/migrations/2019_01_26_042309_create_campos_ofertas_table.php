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
            $table->float('pp1' , 20 , 6)->nullable();
            $table->float('pp2' , 20 , 6)->nullable();
            $table->float('pp3' , 20 , 6)->nullable();
            $table->float('ep1' , 20 , 6)->nullable();
            $table->float('ep2' , 20 , 6)->nullable();
            $table->float('ep3' , 20 , 6)->nullable();
            $table->float('precio_tarifa' , 20 , 6)->nullable();
            $table->float('precio_fijo' , 20 , 6)->nullable();
            $table->date('fecha')->nullable();
            $table->integer('categoria_telefonia')->nullable();
            $table->string('subtitulo_telefonia')->nullable();
            $table->float('precio_telefonia')->nullable();
            $table->float('movil_telefonia')->nullable();
            $table->float('fijo_telefonia')->nullable();
            $table->float('internet_telefonia')->nullable();
            $table->float('tv_telefonia')->nullable();
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
