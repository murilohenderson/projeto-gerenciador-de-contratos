<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'cpf', 'telefone', 'data_nascimento', 'cep', 'rua_logradouro', 'numero', 'bairro', 'cidade', 'estado', 'senha'];
}