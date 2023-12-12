
@extends('layouts.app')

@section('content')
    <h2 class="tittle" >Criar Novo Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">                        
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data" class="mt-5">  
        @csrf
        <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" name="cpf_cnpj" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="foto">Foto:</label>
        <input type="file" name="foto" class="form-control-file">
        </div>
        
        <div class="form-group">
        <label for="nome_social">Nome Social:</label>
        <input type="text" name="nome_social" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button class="btn btn-secondary"><a href="{{ route('clientes.index') }}" class="textlink">Voltar</a></button>
    </form>
@endsection
