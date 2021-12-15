<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosepipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosepipes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('fuel_id')->nullable();
            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('set null');
            $table->unsignedBigInteger('tank_id')->nullable();
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('set null');
            $table->unsignedBigInteger('dispenser_id')->nullable();
            $table->foreign('dispenser_id')->references('id')->on('dispensers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosepipes');
    }
}
