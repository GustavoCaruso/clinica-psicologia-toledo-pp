@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Condição</h1>
    
    <p><strong>Paciente:</strong> {{ $problema->paciente->nome }}</p>
    <p><strong>Data de Identificação:</strong> {{ \Carbon\Carbon::parse($problema->data_identificacao)->format('d/m/Y') }}</p>
    <p><strong>Condição:</strong> {{ $problema->problema }}</p>
    <p><strong>Evolução:</strong> {{ $problema->evolucao }}</p>
    
    <a href="{{ route('problema.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('problema.edit', $problema->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection