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
            $table->unsignedBigInteger('usuario_id');
            $table->string('tipo_solicitud');
            $table->string('estado')->default('pendiente'); // Estado inicial directamente establecido.
            $table->string('descripcion')->nullable(); // Campo descripción puede ser nulo.
            $table->date('fecha_solicitud')->nullable(); // Añadido campo fecha de solicitud, puede ser nulo.
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
