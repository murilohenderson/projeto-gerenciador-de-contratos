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
    Schema::create('contratos', function (Blueprint $table) {
        $table->id();
        $table->string('numero_contrato');  
        $table->string('nome');
        $table->decimal('valor', 20, 2);
        $table->text('descricao')->nullable();
        $table->date('data_vigencia');
        $table->date('data_assinatura');
        
        $table->enum('status', [
            'rascunho',
            'ativo',
            'em_andamento',
            'pendente',
            'suspenso',
            'encerrado',
            'cancelado'
        ])->default('rascunho');
        
        $table->timestamps();
    });
}

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
