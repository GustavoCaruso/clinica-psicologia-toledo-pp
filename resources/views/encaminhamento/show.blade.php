@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Encaminhamento</h1>
    
    <p><strong>Paciente:</strong> {{ $encaminhamento->paciente->nome }}</p>
    <p><strong>Data do Encaminhamento:</strong> {{ \Carbon\Carbon::parse($encaminhamento->data_encaminhamento)->format('d/m/Y') }}</p>
    <p><strong>Profissional Encaminhado:</strong> {{ $encaminhamento->profissional_encaminhado }}</p>
    <p><strong>Descrição:</strong> {{ $encaminhamento->descricao_encaminhamento }}</p>
    
    <a href="{{ route('encaminhamento.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('encaminhamento.edit', $encaminhamento->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
