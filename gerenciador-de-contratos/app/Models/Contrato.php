<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = ['nome', 'descricao', 'valor', 'data_vigencia', 'data_assinatura', 'numero_contrato'];

}