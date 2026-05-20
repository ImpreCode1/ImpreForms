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
        Schema::table('informacion', function (Blueprint $table) {
            $table->integer('tiempo_entrega_cantidad')->nullable();
            $table->string('tiempo_entrega_unidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informacion', function (Blueprint $table) {
            $table->dropColumn(['tiempo_entrega_cantidad', 'tiempo_entrega_unidad']);
        });
    }
};
