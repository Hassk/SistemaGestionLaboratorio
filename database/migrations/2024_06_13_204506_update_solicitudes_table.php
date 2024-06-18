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
        Schema::table('solicitudes', function (Blueprint $table) {
            // Ejemplo de cambios a realizar en la tabla
            $table->string('descripcion')->nullable()->change();
            $table->string('estado')->default('pendiente')->change();
            // Otros cambios que desees realizar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            // Revertir los cambios realizados en up()
            $table->string('descripcion')->nullable(false)->change();
            $table->string('estado')->default(null)->change();
            // Otros cambios de reversión
        });
    }
};
