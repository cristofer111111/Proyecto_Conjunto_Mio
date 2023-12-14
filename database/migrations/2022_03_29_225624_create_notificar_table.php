<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificar', function (Blueprint $table) {
            $table->id();
            $table->biginteger('residente_id')->unsigned();
            $table->foreign('residente_id')->references('id')->on('residente');
            $table->string('titulo');
            $table->string('clasification');
            $table->text('observaciones');
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
        Schema::dropIfExists('notificar');
    }
}
