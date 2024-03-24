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
        Schema::create('comunidad_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('comunidad_id')->references('id')->on('comunidades');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidad_users');
    }
};
