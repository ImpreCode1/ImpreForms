<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas')->nullOnDelete();
            $table->string('cliente');
            $table->string('linea_primaria')->nullable();
            $table->date('fecha_apertura')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->date('fecha_facturacion')->nullable();
            $table->decimal('valor', 15, 2)->nullable();
            $table->string('estado_negocio')->nullable();
            $table->enum('estado', ['anulado', 'declinado', 'en_proceso', 'facturado', 'facturado_y_pagado', 'pendiente', 'recurrencia'])->default('pendiente');
            $table->string('incoterm')->nullable();
            $table->text('anticipos')->nullable();
            $table->text('tiempos_entrega')->nullable();
            $table->text('forma_pago')->nullable();
            $table->text('facturacion')->nullable();
            $table->text('actas_cierre')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamp('crm_sync_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};