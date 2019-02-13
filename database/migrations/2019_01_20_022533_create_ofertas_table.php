<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('slug');
            $table->integer('empresa_id')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->float('precio')->default(0);
            $table->float('precio_diario')->default(0);
            $table->text('descripcion');
            $table->integer('estatus')->default(1);
            $table->integer('tipo')->default(1);
            $table->integer('tarifa')->default(0);
            $table->integer('ventas')->default(0);
            $table->float('comision')->default(0);
            $table->float('plan1')->default(0);
            $table->float('plan2')->default(0);
            $table->float('plan3')->default(0);
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
        Schema::dropIfExists('ofertas');
    }
}
