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
        Schema::create('info_entrega', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('marcas_id')->index('marcas_id');
            $table->string('entrega_cliente')->nullable();
            $table->string('lugar_entrega')->nullable();
            $table->string('pais')->nullable();
            $table->string('puerto')->nullable();
            $table->string('incoterm')->nullable();
            $table->string('transporte')->nullable();
            $table->string('origen')->nullable();
            $table->string('destino')->nullable();
            $table->text('condiciones')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('otros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_entrega');
    }
};
