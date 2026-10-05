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
        Schema::create('produto_processos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('processo_id')
                ->constrained('processos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('maquina_id')
                ->nullable()
                ->constrained('maquinas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedInteger('tempo_pessoa_minutos')->default(0);
            $table->unsignedInteger('tempo_maquina_minutos')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_processos');
    }
};
