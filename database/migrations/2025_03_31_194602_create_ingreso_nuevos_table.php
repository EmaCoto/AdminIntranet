<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ingresos_nuevos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('gmail')->nullable(); // Permite que el campo 'gmail' sea NULL
            $table->enum('estado', ['en espera', 'finalizado'])->default('en espera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos_nuevos');
    }
};
