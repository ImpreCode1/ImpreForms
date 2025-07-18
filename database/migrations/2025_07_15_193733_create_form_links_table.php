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
        Schema::create('form_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('link', 36);
            $table->string('type');
            $table->unsignedBigInteger('marca_id');
            $table->timestamps();
            $table->string('cliente');
            $table->string('crm');
            $table->string('nombre');
            $table->string('forma_pago')->nullable();
            $table->string('moneda')->nullable();
            $table->string('otros')->nullable();
            $table->timestamp('expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_links');
    }
};
