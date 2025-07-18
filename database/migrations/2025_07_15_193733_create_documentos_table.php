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
        Schema::create('documentos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('marcas_id')->index('marcas_id');
            $table->string('tipo_documento')->nullable();
            $table->string('ruta_documento')->nullable();
            $table->dateTime('fecha_subida')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('estado')->nullable()->default('pendiente');
            $table->string('nombre_original', 55)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
