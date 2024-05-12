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
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_juego');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('plataforma_id')->nullable(); // Permitir valores nulos
            $table->foreign('plataforma_id')->references('id')->on('plataformas')->onDelete('cascade');
            $table->string('genero');
            $table->string('edad');
            $table->string('precio');
            $table->string('desarrolladora');
            $table->string('release_year');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};

