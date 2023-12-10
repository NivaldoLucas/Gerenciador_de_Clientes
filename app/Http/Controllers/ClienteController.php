<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();                          //chama todos os clientes
        return view('clientes.index', compact('clientes'));  //redirecionamento para pagina index
    }

    public function create()
    {
        return view('clientes.create');         //redireciona para pagina de CREATE
    }

    public function store(Request $request)
    {
        $request->validate([                                    //regras de validação dos dados a serem passados no request
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'cpf_cnpj' => 'required|unique:clientes',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',          //formatos aceitos de imagem
            'nome_social' => 'nullable',
        ]);

        $data = $request->all();

        
        if ($request->hasFile('foto')) {                                    //IF responsavel pela verificação da existência do arquivo
            $image = $request->file('foto');                                //recebimento do arquivo da requisição
            $imageName = time().'.'.$image->getClientOriginalExtension();   //gera um nome unico pra imagem
            $image->move(public_path('images'), $imageName);                //move o arquivo para o Diretório de Imagens (public/images/)
            $data['foto'] = $imageName;                                     //atualiza os dados do cliente com o nome do arquivo
        }

        Cliente::create($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!'); //redireciona para pagina index com menssagem de sucesso
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);                    //chama o cliente pelo ID
        return view('clientes.show', compact('cliente'));       //retorna a view show
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);                    //chama o cliente pelo ID
        return view('clientes.edit', compact('cliente'));       //retorna a view edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([                                        //regras de validação dos dados
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'cpf_cnpj' => 'required|unique:clientes,cpf_cnpj,'.$id,
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',         //formatos aceitos de imagem
            'nome_social' => 'nullable',
        ]);

        $cliente = Cliente::findOrFail($id);        //chama o cliente pelo id
        $data = $request->all();

        
        if ($request->hasFile('foto')) {                            //verifica se existe foto no request atual

            if ($cliente->foto) {                                    //verifica se existia foto no cliente antes
            unlink(public_path('images').'/'.$cliente->foto);        //deslinka a foto antiga 
            }

            $image = $request->file('foto');                                    //Tratamento da imagem
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['foto'] = $imageName;
        }

        
        $cliente->update($data);                                            //atualiza as informações

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');         //retorna view index com menssagem de sucesso
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);                                                                //chama o cliente pelo id
        $cliente->delete();                                                                                 //deleta o cliente

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');               //retorna com menssagem de exclusao com sucesso
    }
}
