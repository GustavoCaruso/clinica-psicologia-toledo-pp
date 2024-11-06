@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Tratamento</h1>

    <!-- Exibição dos detalhes do tratamento -->
    <p><strong>Paciente:</strong> {{ $tratamento->paciente->nome }}</p>
    <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($tratamento->data_inicio)->format('d/m/Y') }}</p>
    <p><strong>Objetivos:</strong> {{ $tratamento->objetivos }}</p>
    <p><strong>Progresso:</strong> {{ $tratamento->progresso }}</p>

    <!-- Botões de ação -->
    <a href="{{ route('tratamento.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('tratamento.edit', $tratamento->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
