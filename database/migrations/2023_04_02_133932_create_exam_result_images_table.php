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
        Schema::create('exam_result_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_result_id');
            $table->foreign('exam_result_id')->references('id')->on('resultats_examens')->onDelete('cascade');
            $table->string('image_path');
            $table->string('image_url');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_result_images');
    }
};
