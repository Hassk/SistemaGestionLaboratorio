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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_estudiante', 60);
            $table->string('codigo_universitario', 10);
            $table->string('facultad', 20);
            $table->string('docente_a_cargo', 60);
            $table->string('solicitud', 255);
            $table->date('fecha_solicitud');
            $table->string('estado')->default('pendiente'); // Estado inicial establecido.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
