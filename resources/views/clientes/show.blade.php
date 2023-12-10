
@extends('layouts.app')

@section('content')
    <h2>Detalhes do Cliente</h2>
<div class="container-show">

    <table>
        <td>
        @if($cliente->foto) <!-- Verifica se o cliente tem foto. Se sim exibe e se nao retorna "Sem foto" -->
            <img src="{{ asset('images/' . $cliente->foto) }}" alt="Foto do Cliente" style="max-width: 500px; max-height: 300px;">
        @else
            Sem foto
        @endif
        </td>
        <td class="show-infos">
        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $cliente->data_nascimento }}</p>
        <p><strong>CPF/CNPJ:</strong> {{ $cliente->cpf_cnpj }}</p>
        <p><strong>Nome Social:</strong> {{ $cliente->nome_social }}</p>
        <button class="btn btn-save"><a href="{{ route('clientes.index') }}" class="textlink">Voltar</a></button>   
        <!-- botão para voltar pra tela index -->
        </td>
    </table>
    
    </div>
@endsection
