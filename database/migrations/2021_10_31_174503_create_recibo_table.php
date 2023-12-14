<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReciboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibo', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha', $precision = 0);
            $table->double('valor', 8, 2);
            $table->double('valor_pendiente', 8, 2);
            $table->integer('iva');
            $table->double('descuento', 8, 2);
            $table->string('estado',45);
            $table->biginteger('solicitudes_id')->unsigned();
            $table->foreign('solicitudes_id')->references('id')->on('solicitudes');
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
        Schema::dropIfExists('recibo');
    }
}
