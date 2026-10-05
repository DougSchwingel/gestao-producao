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
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nome_razao');
            $table->string('fantasia')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('contato')->nullable();
            $table->text('observacoes')->nullable();
            $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn([
                'nome_razao',
                'fantasia',
                'cpf_cnpj',
                'email',
                'telefone',
                'contato',
                'observacoes',
                'ativo',
            ]);
        });
    }
};
