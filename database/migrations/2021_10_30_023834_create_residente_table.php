<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residente', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_residente');
            $table->biginteger('usuarios_id')->unsigned();
            $table->foreign('usuarios_id')->references('id')->on('users');
            $table->biginteger('apto_id')->unsigned();
            $table->foreign('apto_id')->references('id')->on('apto');
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
        Schema::dropIfExists('residente');
    }
}
