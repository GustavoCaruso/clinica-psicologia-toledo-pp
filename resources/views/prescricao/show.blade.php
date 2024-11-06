@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Prescrição</h1>
    
    <p><strong>Paciente:</strong> {{ $prescricao->paciente->nome }}</p>
    <p><strong>Data da Prescrição:</strong> {{ \Carbon\Carbon::parse($prescricao->data_prescricao)->format('d/m/Y') }}</p>
    <p><strong>Descrição:</strong> {{ $prescricao->descricao_prescricao }}</p>
    
    <a href="{{ route('prescricao.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('prescricao.edit', $prescricao->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
