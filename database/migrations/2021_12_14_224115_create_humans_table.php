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
            $table->string('password')->nullable();
            $table->string('nombre_completo')->nullable();
            $table->string('ci',20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('zona')->nullable();
            $table->string('telefono',100)->nullable();
            $table->string('telefono2',100)->nullable();
            $table->string('nivel_estudio')->nullable();
            $table->string('estado_civil')->nullable();
            $table->integer('hijos')->nullable();
            $table->string('ex_empresa')->nullable();
            $table->string('ex_cargo')->nullable();
            $table->string('ex_tiempo')->nullable();
            $table->string('ex_jefe')->nullable();
            $table->string('ex_renuncia')->nullable();
            $table->string('ex_observaciones')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->string('casillero')->nullable();
            $table->string('siges')->nullable();
            $table->string('biometrico')->nullable();
            $table->string('softcontrol')->nullable();
            $table->string('cuenta_bmsc')->nullable();
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
