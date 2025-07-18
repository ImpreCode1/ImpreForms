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
        Schema::create('marcas', function (Blueprint $table) {
            $table->id(); // reemplaza integer('id', true)
            $table->foreignId('infonegocio_id')->constrained()->cascadeOnDelete(); // si deseas relación
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // opcionalmente cambia según lo necesites

            $table->dateTime('fecha')->nullable();
            $table->string('n_oc')->nullable();
            $table->string('precio_venta', 50)->nullable();
            $table->string('adjunto_cotizacion')->nullable();
            $table->string('tipo_contrato')->nullable();
            $table->string('tipo_solicitud')->nullable();
            $table->string('linea')->nullable();
            $table->string('codigo_linea')->nullable();
            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('otro')->nullable();
            $table->string('cel')->nullable();
            $table->string('email')->nullable();
            $table->string('director')->nullable();
            $table->string('numero')->nullable();
            $table->string('correo_director')->nullable();
            $table->string('cod_ejc')->nullable();
            $table->string('nombre_ejc')->nullable();
            $table->string('telefono_ejc')->nullable();
            $table->string('email_ejc')->nullable();
            $table->string('estado', 50)->nullable(); // no es necesario si se usa accessor dinámico

            $table->timestamps(); // reemplaza created_at y updated_at manuales

            // índices adicionales si necesitas
            // $table->index('infonegocio_id');
            // $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcas');
    }
};
