<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lignes_ordonnances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordonnance_id');
            $table->string('medicament');
            $table->text('posologie')->nullable();
            $table->timestamps();

            $table->foreign('ordonnance_id')->references('id')->on('ordonnances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lignes_ordonnances');
    }
};
