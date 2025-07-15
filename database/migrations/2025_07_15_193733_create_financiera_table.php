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
        Schema::create('financiera', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('marcas_id')->index('marcas_id');
            $table->string('plazo')->nullable();
            $table->string('forma_pago')->nullable();
            $table->string('moneda')->nullable();
            $table->string('garantiascredit')->nullable();
            $table->boolean('existencia_anticipo')->nullable();
            $table->decimal('porcentaje', 5)->nullable();
            $table->dateTime('fecha_pago')->nullable();
            $table->string('otros')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financiera');
    }
};
