<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nome'            => 'required|min:3',
            'descricao'       => 'nullable',
            'numero_contrato' => 'required|unique:contratos,numero_contrato', 
            'valor'           => 'required|numeric',
            'data_vigencia'   => 'required|date',
            'data_assinatura' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'numero_contrato.required' => 'O campo do número do contrato é obrigatório.',
            'valor.required' => 'O campo valor é obrigatório.',
            'data_vigencia.required' => 'O campo da data de vigência é obrigatório.',
            'data_assinatura.required' => 'O campo da data da assinatura é obrigatório.',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',
        ];
    }
}
