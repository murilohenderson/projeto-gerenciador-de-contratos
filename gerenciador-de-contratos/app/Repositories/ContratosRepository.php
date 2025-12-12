<?php

namespace App\Repositories;

use App\Http\Requests\ContratoFormRequest;
use App\Models\Contrato;

interface ContratosRepository 
{
    public function add(ContratoFormRequest $request): Contrato;
}

?>