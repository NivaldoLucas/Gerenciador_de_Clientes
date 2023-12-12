
@extends('layouts.app')

@section('content')
    <h2 class="tittle">Detalhes do Cliente</h2>
<div class="container-show">

    <table class="table table-show">
        <td class="td-img">
        @if($cliente->foto)
            <img src="{{ asset('images/' . $cliente->foto) }}" alt="Foto do Cliente" class="rounded-image" style="max-width: 500px; max-height: 300px;">
        @else
            Sem foto
        @endif
        </td>
        <td class="show-infos">
        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $cliente->data_nascimento }}</p>
        <p><strong>CPF/CNPJ:</strong> {{ $cliente->cpf_cnpj }}</p>
        <p><strong>Nome Social:</strong> {{ $cliente->nome_social }}</p>
        <button class="btn btn-primary"><a href="{{ route('clientes.index') }}" class="textlink">Voltar</a></button>   
        </td>
    </table>
    
    </div>
@endsection
