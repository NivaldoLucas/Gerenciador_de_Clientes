
@extends('layouts.app')

@section('content')
    <h1 class="tittle">Listagem de Clientes</h2>

    @if(session('success'))                 
        <div class="alert alert-success">   
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-index">
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
                        @if($cliente->foto)
                            <img src="{{ asset('images/' . $cliente->foto) }}" alt="Foto do Cliente" class="rounded-image" style="max-width: 50px; max-height: 50px;">
                        @else
                            Sem foto
                        @endif
                    </td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->data_nascimento }}</td>
                    <td>{{ $cliente->cpf_cnpj }}</td>
                    
                    <td>{{ $cliente->nome_social }}</td>

                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-primary"><a href="{{ route('clientes.show', $cliente->id) }}" class="textlink">Detalhes</a></button>
                            <button class="btn btn-edit"><a href="{{ route('clientes.edit', $cliente->id) }}" class="textlink">Editar</a></button>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-newclient"><a href="{{ route('clientes.create') }}" class="textlink">Novo Cliente</a></button>
    
@endsection
