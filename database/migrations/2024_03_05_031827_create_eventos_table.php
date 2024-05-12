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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');   
            $table->string('descripcion');   
            $table->foreignId('user_id')->constrained();
            $table->foreignId('comunidad_id')->constrained('comunidades')->onDelete('cascade');
            $table->enum('estado_moderacion',['aprobado','en revision','rechazado'])->default('en revision');
            $table->dateTime('fecha_hora_evento');   
            $table->unsignedInteger('duracion_horas')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
