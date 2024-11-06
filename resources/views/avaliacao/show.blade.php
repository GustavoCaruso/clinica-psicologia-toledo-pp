@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Avaliação Psicológica</h1>
    <p><strong>Paciente:</strong> {{ $avaliacao->paciente->nome }}</p>
    <p><strong>Data da Avaliação:</strong> {{ \Carbon\Carbon::parse($avaliacao->data_avaliacao)->format('d/m/Y') }}</p>
    <p><strong>Observações:</strong> {{ $avaliacao->observacoes }}</p>
    
    <a href="{{ route('avaliacao.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('avaliacao.edit', $avaliacao->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
