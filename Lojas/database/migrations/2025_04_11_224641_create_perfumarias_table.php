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
        Schema::create('perfumarias', function (Blueprint $table) {
            $table->id();
            $table->string('nome_perfumaria');
            $table->string('setor_perfumaria'); 
            $table->string('funcionarios_perfumaria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfumarias');
    }
};
