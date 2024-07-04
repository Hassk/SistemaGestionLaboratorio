<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->unique(); // Asegúrate de que esta línea existe
            $table->longText('value');
            $table->integer('expiration');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cache');
    }
};
