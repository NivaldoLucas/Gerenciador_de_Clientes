
@extends('layouts.app')

@section('content')
    <h2 class="tittle">Listagem de Clientes</h2>

    @if(session('success'))                 <!-- Verifica se existe uma variável de sessão chamada 'success' se ela existir renderiza um bloco HTML com fundo verde -->
                                            <!--  Variáveis de sessão são usadas para armazenar dados temporários entre solicitações HTTP -->
        <div class="alert alert-success">   
            <ul>
            <li>{{ session('success') }}</li>   
            </ul>
        </div>
    @endif

    <table class="table">                               <!-- tabela com as informações dos clientes -->
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF/CNPJ</th>
                <th>Nome Social</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>

                    <td>
                        @if($cliente->foto)         <!-- Verifica se o cliente tem foto. Se sim exibe e se nao retorna "Sem foto" -->
                            <img src="{{ asset('images/' . $cliente->foto) }}" alt="Foto do Cliente" style="max-width: 50px; max-height: 50px;">
                        @else
                            Sem foto
                        @endif
                    </td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->data_nascimento }}</td>
                    <td>{{ $cliente->cpf_cnpj }}</td>
                    
                    <td>{{ $cliente->nome_social }}</td>
                    <td>
                        <!-- botões responsaveis por encaminhar o usuario para rota de visualização, edição e delete -->
                        <button class="btn btn-show"><a href="{{ route('clientes.show', $cliente->id) }}" class="textlink">Detalhes</a></button>
                        <button class="btn btn-edit"><a href="{{ route('clientes.edit', $cliente->id) }}" class="textlink">Editar</a></button>
                        
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- botão para ir para pagina de criação de cliente -->
    <button class="btn btn-newclient"><a href="{{ route('clientes.create') }}" class="textlink">Novo Cliente</a></button>
    
@endsection
