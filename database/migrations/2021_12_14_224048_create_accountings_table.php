<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountings', function (Blueprint $table) {
            $table->id();
            $table->double('monto', 15, 2);
            $table->double('meter_inicial', 15, 2);
            $table->double('meter_final', 15, 2);
            $table->string('tipo')->nullable();
            $table->unsignedBigInteger('turn_id')->nullable();
            $table->foreign('turn_id')->references('id')->on('turns')->onDelete('cascade');
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->unsignedBigInteger('hosepipe_id')->nullable();
            $table->foreign('hosepipe_id')->references('id')->on('hosepipes')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('accountings');
    }
}
