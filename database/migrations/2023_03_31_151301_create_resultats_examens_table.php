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
        Schema::create('resultats_examens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dossier_medical_id');
            $table->dateTime('date');
            $table->string('type');
            $table->text('resultat')->nullable();
            $table->timestamps();

            $table->foreign('dossier_medical_id')->references('id')->on('dossier_medicals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats_examens');
    }
};
