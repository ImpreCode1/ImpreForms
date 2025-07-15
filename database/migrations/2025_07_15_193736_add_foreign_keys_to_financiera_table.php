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
        Schema::table('financiera', function (Blueprint $table) {
            $table->foreign(['marcas_id'], 'financiera_ibfk_1')->references(['id'])->on('marcas')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financiera', function (Blueprint $table) {
            $table->dropForeign('financiera_ibfk_1');
        });
    }
};
