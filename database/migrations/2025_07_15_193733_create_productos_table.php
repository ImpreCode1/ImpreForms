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
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('informacion_id')->index('informacion_id');
            $table->text('detalles_equipos')->nullable();
            $table->text('aplica_garantia')->nullable();
            $table->string('termino_garantia')->nullable();
            $table->text('aplica_poliza')->nullable();
            $table->double('porcentaje_poliza')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
