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
        Schema::create('usuarios', function (Blueprint $table) {
    $table->id(); // Cria ID automático
    
    // Texto curto (VARCHAR)
    $table->string('nome'); 
    $table->string('email')->unique(); 
    $table->string('cpf', 14)->nullable()->unique(); 
    $table->string('telefone')->nullable();
    
    $table->date('data_nascimento')->nullable();
    
    $table->string('cep', 9)->nullable();
    $table->string('rua_logradouro')->nullable();
    $table->string('numero')->nullable();
    $table->string('bairro')->nullable();
    $table->string('cidade')->nullable();
    $table->char('estado', 2)->nullable();
    
    $table->string('senha');
    
    $table->timestamps(); 
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usurios');
    }
};
