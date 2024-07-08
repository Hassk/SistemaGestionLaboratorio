<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->string('nombre_estudiante');
            $table->string('codigo_universitario');
            $table->string('facultad');
            $table->string('docente_a_cargo');
            $table->string('descripcion'); // Se incluye directamente la descripción actualizada
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->string('estado')->default('Activo');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
