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
        Schema::create('distrito_encuesta', function (Blueprint $table) {
            $table->id();
            $table->string('estado_encuesta')->nullable();
            $table->text('observacion')->nullable();
            $table->foreignId('encuesta_id')->constrained()->onDelete('cascade');
            $table->foreignId('distrito_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distrito_encuesta');
    }
};
