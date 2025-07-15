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
        Schema::create('directores', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('nombre_director')->nullable();
            $table->string('cargo')->nullable();
            $table->string('area_vp')->nullable();
            $table->string('subarea_division')->nullable();
            $table->string('mail')->nullable()->unique('correo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directores');
    }
};
