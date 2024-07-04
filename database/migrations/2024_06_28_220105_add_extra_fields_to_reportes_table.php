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
        Schema::table('reportes', function (Blueprint $table) {
            $table->string('nombre_estudiante')->after('descripcion');
            $table->string('codigo_universitario')->after('nombre_estudiante');
            $table->string('facultad')->after('codigo_universitario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->dropColumn(['nombre_estudiante', 'codigo_universitario', 'facultad', 'created_at']);
        });
    }
};
