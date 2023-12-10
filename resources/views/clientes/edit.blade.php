
@extends('layouts.app')

@section('content')
    <h2>Editar Cliente</h2>

    @if ($errors->any())                                       <!-- Verifica se há algum erro de validação presente.  -->
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>                      <!-- Se existir erro de validação renderiza o bloco HTML -->
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario responsavel pela atualização de um cliente  -->
    <!-- Formulário será enviado para a rota clientes.store com o ID do cliente, com o metodo POST  -->

    <form action="{{ route('clientes.update', $cliente->id) }}" method="post" enctype="multipart/form-data">

        <!-- Adiciona um token CSRF e muda a solicitação HTTP para ser tratada como um método PUT (atualização) -->
        @csrf       
        @method('put')
        
        <label for="nome">Nome:</label>                         
        <input type="text" name="nome" value="{{ $cliente->nome }}" required>      <!-- Os campos ja estao preenchidos com os dados atuais do cliente --> 
        <br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ $cliente->data_nascimento }}" required>
        <br>

        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" name="cpf_cnpj" value="{{ $cliente->cpf_cnpj }}" required>
        <br>

        <label for="foto">Nova Foto:</label>
        <input type="file" name="foto">
        <br>

        <label for="nome_social">Nome Social:</label>
        <input type="text" name="nome_social" value="{{ $cliente->nome_social }}">
        <br>

        <button type="submit" class="btn btn-save">Salvar</button>                  <!-- botao responsavel por enviar o formulario  -->
        <button class="btn btn-save"><a href="{{ route('clientes.index') }}" class="textlink">Voltar</a></button>   <!-- botao responsavel para voltar para pagina index -->
    </form>

    
@endsection
