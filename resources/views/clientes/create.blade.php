
@extends('layouts.app')

@section('content')
    <h2>Criar Novo Cliente</h2>

    @if ($errors->any())                                        <!-- Verifica se há algum erro de validação presente.  -->
        <div class="alert alert-danger">                        
            <ul>
                @foreach ($errors->all() as $error)             <!-- Se existir erro de validação renderiza o bloco HTML  -->
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario responsavel pela criação de um cliente  -->
    <!-- Formulário será enviado para a rota clientes.store, com o metodo POST  -->

    <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data">  
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required>
        <br>

        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" name="cpf_cnpj" required>
        <br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto">
        <br>

        <label for="nome_social">Nome Social:</label>
        <input type="text" name="nome_social">
        <br>

        <button type="submit" class="btn btn-save">Salvar</button>   <!-- botao responsavel por enviar o formulario  -->
    </form>
@endsection
