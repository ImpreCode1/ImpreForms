<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('productos')
            ->whereIn('aplica_garantia', ['si', 'no'])
            ->update(['aplica_garantia' => null]);
    }

    public function down(): void
    {
        // No reversible — los valores originales no se preservan
    }
};
