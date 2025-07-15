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
        Schema::create('executives', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cc')->nullable();
            $table->string('nombre_colaborador')->nullable();
            $table->string('cargo')->nullable();
            $table->string('area_vp')->nullable();
            $table->string('subarea_division')->nullable();
            $table->string('mail')->nullable();
            $table->string('codigo_area_funcional_ceco')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executives');
    }
};
