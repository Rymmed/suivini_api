<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRappelprisemedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rappelprisemedicaments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('heure');
            $table->unsignedBigInteger('idligneordonnance');
            //$table->foreign('idligneordonnance')->references('id')->on('ligneordonnances');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rappelprisemedicaments');
    }
}
