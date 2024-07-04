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
            $table->unsignedBigInteger('usuario_id')->nullable()->change();
        });
    }
    
    public function down(): void
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->nullable(false)->change(); // Revertir el cambio si es necesario
        });
    }
    
};
