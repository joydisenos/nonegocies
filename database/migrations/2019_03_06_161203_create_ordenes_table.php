<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('oferta_id');
            $table->float('comision');
            $table->float('pp1' , 20 , 6)->nullable();
            $table->float('pp2' , 20 , 6)->nullable();
            $table->float('pp3' , 20 , 6)->nullable();
            $table->float('ep1' , 20 , 6)->nullable();
            $table->float('ep2' , 20 , 6)->nullable();
            $table->float('ep3' , 20 , 6)->nullable();
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
        Schema::dropIfExists('ordenes');
    }
}
