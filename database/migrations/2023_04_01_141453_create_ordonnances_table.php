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
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rendezvous_id');
            $table->unsignedBigInteger('dossier_medical_id');
            $table->text('observations')->nullable();
            $table->timestamps();

            $table->foreign('dossier_medical_id')->references('id')->on('dossier_medicals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnances');
    }
};
