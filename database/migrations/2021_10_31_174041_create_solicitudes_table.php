<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_evento', $precision = 0);
            $table->biginteger('residente_id')->unsigned();
            $table->foreign('residente_id')->references('id')->on('residente');
            $table->biginteger('servicios_id')->unsigned();
            $table->foreign('servicios_id')->references('id')->on('servicios');
            $table->string('estado',45);
            $table->text('observacionesAdmin');
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
        Schema::dropIfExists('solicitudes');
    }
}
