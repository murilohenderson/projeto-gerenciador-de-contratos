<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contrato;

class ContratosController extends Controller
{
    public function index(Request $request)
    {
        $contratos = Contrato::query()->orderBy('data_vigencia')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('contratos.index', ['contratos' => $contratos])->with('mensagem.sucesso', $mensagemSucesso);
    }
    
    public function create()
    {
        return view('contratos.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3', 
            'descricao' => 'nullable',
            'numero_contrato' => 'required|unique:contratos,numero_contrato', 
            'valor' => 'required|numeric',
            'data_vigencia' => 'required|date',
            'data_assinatura' => 'required|date',
        ]);

        Contrato::create($request->all());
        
        return to_route('contratos.index')
               ->with('mensagem.sucesso', "Contrato '{$request->nome}' cadastrado com sucesso!");
    }
    
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();

        return to_route('contratos.index')
                ->with('mensagem.sucesso', "Contrato de número '{$contrato->numero_contrato}' removido com sucesso.");
    }
    
    public function edit(Contrato $contrato)
    {
        return view('contratos.edit')->with('contrato', $contrato);
    }
    
    public function update(Contrato $contrato, Request $request) 
    {
        $contrato->nome = $request->nome;
        $contrato->descricao = $request->descricao;
        $contrato->numero_contrato = $request->numero_contrato;
        $contrato->valor = $request->valor;
        $contrato->data_vigencia = $request->data_vigencia;
        $contrato->data_assinatura = $request->data_assinatura;
        
        $contrato->save();

        return to_route('contratos.index')
                ->with('mensagem.sucesso', "Informações do Contrato '{$contrato->nome}' atualizadas com sucesso.");
    }
}