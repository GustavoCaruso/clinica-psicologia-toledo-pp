@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Identificar Nova Condição</h1>
    
    <form id="problemaForm" action="{{ route('problema.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id" id="paciente_id" required>
                <option value="">Selecione o Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_identificacao" class="form-label">Data de Identificação</label>
            <input type="date" class="form-control" name="data_identificacao" id="data_identificacao" required>
        </div>

        <div class="mb-3">
            <label for="problema" class="form-label">Condição</label>
            <input type="text" class="form-control" name="problema" id="problema" required>
        </div>

        <div class="mb-3">
            <label for="evolucao" class="form-label">Evolução</label>
            <textarea class="form-control" name="evolucao" id="evolucao" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Criar Condição</button>
        <a href="{{ route('problema.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
