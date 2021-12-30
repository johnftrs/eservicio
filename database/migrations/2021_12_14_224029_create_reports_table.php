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
            $table->date('fecha')->nullable();
            $table->double('monto_total', 15, 2)->nullable();
            $table->double('efectivo', 15, 2)->nullable();
            $table->double('tarjeta', 15, 2)->nullable();
            $table->string('firmado',1)->nullable();
            $table->integer('_200')->nullable();
            $table->integer('_100')->nullable();
            $table->integer('_50')->nullable();
            $table->integer('_20')->nullable();
            $table->integer('_10')->nullable();
            $table->double('monedas', 15, 2);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('turn_id')->nullable();
            $table->foreign('turn_id')->references('id')->on('turns')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
