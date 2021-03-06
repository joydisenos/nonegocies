<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->integer('referido_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('tipo')->nullable();
            $table->integer('plan_id')->nullable();
            $table->string('direccion')->nullable();
            $table->string('dni')->nullable();
            $table->string('cp')->nullable();
            $table->string('localidad')->nullable();
            $table->string('tipodni_id')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cup_gas')->nullable();
            $table->string('cup_luz')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
