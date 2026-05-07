<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('codigos', function (Blueprint $table) {
            $table->integer('codigo')->nullable()->change();
            $table->string('descripcion')->nullable()->after('codigo_cliente');
            $table->boolean('activo')->default(true)->after('descripcion');
        });
    }

    public function down(): void
    {
        Schema::table('codigos', function (Blueprint $table) {
            $table->dropColumn(['descripcion', 'activo']);
        });
    }
};