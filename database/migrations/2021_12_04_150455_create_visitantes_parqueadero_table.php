<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesParqueaderoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes_parqueadero', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->biginteger('visitante_id')->unsigned();
            $table->foreign('visitante_id')->references('id')->on('visitantes');
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
        Schema::dropIfExists('visitantes_parqueadero');
    }
}
