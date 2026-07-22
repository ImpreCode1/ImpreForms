<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objeto_contrato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marca_id')->constrained('marcas')->cascadeOnDelete();
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('tipo')->nullable();
            $table->decimal('precio_unitario', 15, 2)->nullable();
            $table->decimal('precio_total', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objeto_contrato');
    }
};
