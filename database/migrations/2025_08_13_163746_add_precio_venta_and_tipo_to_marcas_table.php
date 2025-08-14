<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->string('forma_pago')->nullable();
            $table->string('fecha_cada_pago')->nullable();
            $table->enum('moneda', ['COP', 'USD'])->nullable();
            $table->boolean('incluir_iva')->default(false);
            $table->boolean('hay_anticipo')->default(false);
            $table->decimal('porcentaje_anticipo', 5, 2)->nullable();
            $table->date('fecha_pago_anticipo')->nullable();
            $table->text('otros_pago')->nullable();
            $table->enum('moneda_precio_venta', ['COP', 'USD'])->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->dropColumn([
                'forma_pago',
                'fecha_cada_pago',
                'moneda',
                'incluir_iva',
                'hay_anticipo',
                'porcentaje_anticipo',
                'fecha_pago_anticipo',
                'otros_pago',
                'moneda_precio_venta',
            ]);
        });
    }
};
