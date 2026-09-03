<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('objeto_contrato', function (Blueprint $table) {
            $table->string('garantia_tipo')->nullable();
            $table->integer('garantia_cantidad')->nullable();
            $table->string('garantia_unidad')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('objeto_contrato', function (Blueprint $table) {
            $table->dropColumn(['garantia_tipo', 'garantia_cantidad', 'garantia_unidad']);
        });
    }
};
