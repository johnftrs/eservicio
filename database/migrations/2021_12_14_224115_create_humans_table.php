<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humans', function (Blueprint $table) {
            $table->id();
            $table->string('ci',20)->nullable();
            $table->string('nombre');
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono',100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('nivel_estudio')->nullable();
            $table->integer('biometrico')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('afp')->nullable();
            $table->string('foto')->nullable();
            $table->string('nombre_garante')->nullable();
            $table->string('relacion_garante')->nullable();
            $table->string('telefono_garante')->nullable();
            $table->string('trabajo_garante')->nullable();
            $table->string('direccion_garante')->nullable();
            $table->string('nombre_referencia_personal')->nullable();
            $table->string('relacion_referencia_personal')->nullable();
            $table->string('telefono_referencia_personal')->nullable();
            $table->string('trabajo_referencia_personal')->nullable();
            $table->string('direccion_referencia_personal')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('humans');
    }
}
