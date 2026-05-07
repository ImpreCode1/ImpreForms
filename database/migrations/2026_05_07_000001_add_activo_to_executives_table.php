<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('executives', function (Blueprint $table) {
            $table->string('nombre')->nullable()->after('cc');
            $table->string('email')->nullable()->after('nombre');
            $table->boolean('activo')->default(true)->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('executives', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'email', 'activo']);
        });
    }
};