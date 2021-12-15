<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->double('monto', 15, 2);
            $table->double('efectivo', 15, 2);
            $table->double('tarjeta', 15, 2);
            $table->string('firmado',1)->default("N");
            $table->integer('200')->nullable();
            $table->integer('100')->nullable();
            $table->integer('50')->nullable();
            $table->integer('20')->nullable();
            $table->integer('10')->nullable();
            $table->integer('monedas')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('turn_id')->nullable();
            $table->foreign('turn_id')->references('id')->on('turns')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
