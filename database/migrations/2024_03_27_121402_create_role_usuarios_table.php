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
        Schema::create('role_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('role_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_usuarios');
    }
};
