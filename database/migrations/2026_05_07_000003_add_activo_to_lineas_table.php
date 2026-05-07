<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lineas', function (Blueprint $table) {
            $table->string('codigo')->nullable()->after('id');
            $table->boolean('activo')->default(true)->after('linea');
        });
    }

    public function down(): void
    {
        Schema::table('lineas', function (Blueprint $table) {
            $table->dropColumn(['codigo', 'activo']);
        });
    }
};