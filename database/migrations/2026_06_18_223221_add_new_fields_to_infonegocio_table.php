<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('infonegocio', function (Blueprint $table) {
            $table->string('nit')->nullable()->after('nom_rep');
            $table->string('direccion_domicilio')->nullable()->after('nit');
            $table->string('cc_representante')->nullable()->after('direccion_domicilio');
        });
    }

    public function down(): void
    {
        Schema::table('infonegocio', function (Blueprint $table) {
            $table->dropColumn(['nit', 'direccion_domicilio', 'cc_representante']);
        });
    }
};
