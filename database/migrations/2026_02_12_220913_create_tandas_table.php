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
        Schema::create('tandas', function (Blueprint $table) {
            $table->id();
            $table->integer("competidores")->default(30);
            $table->decimal("penalizacion_pepita_no_encontrada", 8, 3)->default(45);
            $table->integer("numero_pepitas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tandas');
    }
};
