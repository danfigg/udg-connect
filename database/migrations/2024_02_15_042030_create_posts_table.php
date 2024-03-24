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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('contenido');
            $table->enum('semestre',['1','2','3','4','5','6','7','8','9','10','all']);
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('comunidad_id');
            $table->foreign('comunidad_id')->references('id')->on('comunidades')->onDelete('cascade');
            $table->enum('estado_moderacion',['rechazado','aprobado','en revision'])->default('en revision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
