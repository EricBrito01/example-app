<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('selecao', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->unsignedBigInteger('fk_clienteId');
            $table->unsignedBigInteger('fk_candidatoId');
            $table->foreign('fk_clienteId')->references('id')->on('cliente')->onDelete('cascade');
            $table->foreign('fk_candidatoId')->references('id')->on('candidatos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selecao');
    }
};
