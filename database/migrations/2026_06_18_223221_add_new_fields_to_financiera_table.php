<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('financiera', function (Blueprint $table) {
            $table->string('facturacion_moneda')->nullable()->after('otros');
            $table->string('trm')->nullable()->after('facturacion_moneda');
            $table->string('cuenta_compensacion')->nullable()->after('trm');
            $table->decimal('saldo_restante_porcentaje', 5, 2)->nullable()->after('cuenta_compensacion');
            $table->decimal('saldo_restante_valor', 15, 2)->nullable()->after('saldo_restante_porcentaje');
            $table->date('saldo_restante_fecha_pago')->nullable()->after('saldo_restante_valor');
            $table->string('otras_observaciones', 500)->nullable()->after('saldo_restante_fecha_pago');
        });
    }

    public function down(): void
    {
        Schema::table('financiera', function (Blueprint $table) {
            $table->dropColumn([
                'facturacion_moneda',
                'trm',
                'cuenta_compensacion',
                'saldo_restante_porcentaje',
                'saldo_restante_valor',
                'saldo_restante_fecha_pago',
                'otras_observaciones',
            ]);
        });
    }
};
