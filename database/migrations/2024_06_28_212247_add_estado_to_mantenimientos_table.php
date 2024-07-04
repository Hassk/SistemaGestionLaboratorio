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
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->string('estado')->default('en curso'); // Todos los mantenimientos empiezan como "en curso"
        });
    }
    
    public function down()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
    
};
