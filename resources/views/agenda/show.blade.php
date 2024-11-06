@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Agendamento</h1>
    
    <p><strong>Paciente:</strong> {{ $agenda->paciente->nome }}</p>
    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($agenda->data_agendamento)->format('d/m/Y') }}</p>
    <p><strong>Hora:</strong> {{ $agenda->hora_agendamento }}</p>
    
    <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
