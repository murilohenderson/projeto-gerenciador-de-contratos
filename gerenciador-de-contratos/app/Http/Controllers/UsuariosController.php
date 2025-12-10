<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index() 
    {
        $usuarios = Usuario::all();
        return view('contratos.index', compact('usuarios'));
    }

    public function create() 
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            //
        ]);

        Usuario::create([
            'nome'            => $request->nome,
            'email'           => $request->email,
            'cpf'             => $request->cpf,
            'telefone'        => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'cep'             => $request->cep,
            'rua_logradouro'  => $request->rua_logradouro, 
            'numero'          => $request->numero,
            'bairro'          => $request->bairro,
            'cidade'          => $request->cidade,
            'estado'          => $request->estado,
            'senha'           => Hash::make($request->senha),
        ]);

        return to_route('contratos.index')->with('success', 'Usuário criado com sucesso!');
    }
}