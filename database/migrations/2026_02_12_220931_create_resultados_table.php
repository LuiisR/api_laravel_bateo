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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tanda_id")->constrained()->cascadeOnDelete();
            $table->foreignId("participante_id")->constrained()->cascadeOnDelete();
            $table->decimal("tiempo", 8, 3);
            $table->integer("pepitas_encontradas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
