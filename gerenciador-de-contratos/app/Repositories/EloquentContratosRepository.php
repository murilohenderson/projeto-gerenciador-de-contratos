<?php

namespace App\Repositories;

use App\Models\Contrato;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContratoFormRequest; 

class EloquentContratosRepository implements ContratosRepository
{
    public function add(ContratoFormRequest $request): Contrato
    {
        $contrato = DB::transaction(function () use ($request) {
            return Contrato::create($request->all());
        });

        return $contrato;
    }
}