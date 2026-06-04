<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('marcas', function (Blueprint $table) {
            $table->enum('estado_autorizacion', ['pendiente', 'en_revision', 'aprobado', 'rechazado'])
                  ->default('pendiente')
                  ->after('estado');
            $table->text('comentario_autorizacion')->nullable()->after('estado_autorizacion');
            $table->timestamp('autorizado_en')->nullable()->after('comentario_autorizacion');
            $table->foreignId('autorizado_por')->nullable()
                  ->constrained('users')->after('autorizado_en');
        });
    }

    public function down(): void {
        Schema::table('marcas', function (Blueprint $table) {
            $table->dropForeign(['autorizado_por']);
            $table->dropColumn(['estado_autorizacion', 'comentario_autorizacion', 'autorizado_en', 'autorizado_por']);
        });
    }
};
