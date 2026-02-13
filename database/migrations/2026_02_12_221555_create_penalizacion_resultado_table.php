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
        Schema::create('penalizacion_resultado', function (Blueprint $table) {
            $table->id();
            $table->foreignId("resultado_id")->constrained("resultados")->cascadeOnDelete();
            $table->foreignId("penalizacion_id")->constrained("penalizaciones")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalizacion_resultado');
    }
};

