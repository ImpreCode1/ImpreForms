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
        Schema::create('informacion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('marcas_id')->index('marcas_id');
            $table->string('realiza_entrega_cliente')->nullable();
            $table->string('lugar_entrega')->nullable();
            $table->string('pais')->nullable();
            $table->string('tiempo_entrega')->nullable();
            $table->dateTime('fecha_inicio_termino')->nullable();
            $table->string('tipo_incoterms')->nullable();
            $table->string('servicio_a_prestar')->nullable();
            $table->string('frecuencia_suministro')->nullable();
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_finalizacion')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('estado')->nullable()->default('pendiente');
            $table->string('entrega_realizar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion');
    }
};
