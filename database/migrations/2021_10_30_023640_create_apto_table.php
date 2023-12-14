<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAptoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apto', function (Blueprint $table) {
            $table->id();
            $table->string('apartamento');
            $table->biginteger('torre_id')->unsigned();
            $table->foreign('torre_id')->references('id')->on('torre');
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
        Schema::dropIfExists('apto');
    }
}
