<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('auditoria_observaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seguimiento_id')->constrained('seguimientos')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('campo');
            $table->text('valor_anterior')->nullable();
            $table->text('valor_nuevo')->nullable();
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditoria_observaciones');
    }
};