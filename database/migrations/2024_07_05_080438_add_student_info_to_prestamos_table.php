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
        Schema::table('prestamos', function (Blueprint $table) {
            $table->string('nombre_estudiante')->after('producto_id');
            $table->string('codigo_universitario')->after('nombre_estudiante');
            $table->string('facultad')->after('codigo_universitario');
            $table->string('docente_a_cargo')->after('facultad');
        });
    }
    
    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropColumn(['nombre_estudiante', 'codigo_universitario', 'facultad', 'docente_a_cargo']);
        });
    }
    
};
