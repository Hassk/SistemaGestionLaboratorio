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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_laboratorio', 20);
            $table->string('codigo_fabrica', 20);
            $table->string('nombre', 150);
            $table->string('descripcion', 255);
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->integer('cantidad');
            $table->string('estado')->default('disponible');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
