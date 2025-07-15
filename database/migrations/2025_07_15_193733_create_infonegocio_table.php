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
        Schema::create('infonegocio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo_cliente');
            $table->string('nombre');
            $table->string('correo');
            $table->string('numero_celular')->nullable();
            $table->string('n_oportunidad_crm')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('estado')->nullable()->default('pendiente');
            $table->string('nom_rep')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infonegocio');
    }
};
