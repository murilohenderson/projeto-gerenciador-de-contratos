<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;

class ContratoInfoController extends Controller
{
    public function index(Contrato $contrato) 
    {

        return view('contratosinfo.index')->with('contrato', $contrato);
    }
}
