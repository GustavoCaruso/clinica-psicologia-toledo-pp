@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Diagnóstico</h1>
    <p><strong>Paciente:</strong> {{ $diagnostico->paciente->nome }}</p>
    <p><strong>Data:</strong> {{ $diagnostico->data_diagnostico }}</p>
    <p><strong>Diagnóstico:</strong> {{ $diagnostico->diagnostico }}</p>
    <p><strong>Descrição:</strong> {{ $diagnostico->descricao }}</p>
    
    <a href="{{ route('diagnostico.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('diagnostico.edit', $diagnostico->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
