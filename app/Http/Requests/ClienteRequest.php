<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
       
        $rules = [
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'cpf_cnpj' => 'required|unique:clientes',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome_social' => 'nullable',
        ];

        
        if ($this->isMethod('put')) {
            $rules['cpf_cnpj'] = 'required|unique:clientes,cpf_cnpj,' . $this->route('cliente');
        }

        return $rules;
    }
}
