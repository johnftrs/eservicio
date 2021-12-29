<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispensers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('meter', 15, 2)->nullable();
            $table->unsignedBigInteger('fuel_id')->nullable();
            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('set null');
            $table->unsignedBigInteger('tank_id')->nullable();
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('set null');
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispensers');
    }
}
