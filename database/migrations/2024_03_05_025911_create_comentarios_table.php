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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('cuerpo');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->unsignedBigInteger('comentario_id')->nullable();
            $table->foreign('comentario_id')->references( 'id' )->on( 'comentarios' );
            $table->enum('estado_moderacion',["Visible","En revisión","Bloqueado"])->default('Visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
