<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuySellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_sells', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_descarga')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->time('hora_descarga', $precision = 0)->nullable();
            $table->double('cantidad', 15, 2)->nullable();
            $table->string('nro_compra')->nullable();
            $table->string('factura')->nullable();
            $table->double('papeleria', 15, 2)->nullable();
            $table->double('adicional', 15, 2)->nullable();
            $table->double('debito_banco', 15, 2)->nullable();
            $table->string('vehiculo')->nullable();
            $table->string('chofer')->nullable();
            $table->string('responsable')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('tipo', 20)->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
            $table->unsignedBigInteger('tank_id')->nullable();
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('set null');
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('buy_sells');
    }
}
