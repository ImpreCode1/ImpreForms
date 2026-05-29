<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informacion', function (Blueprint $table) {
            $table->integer('cantidad_entregas')->nullable();
            $table->date('fecha_entrega')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('informacion', function (Blueprint $table) {
            $table->dropColumn('cantidad_entregas');
            $table->dropColumn('fecha_entrega');
        });
    }
};