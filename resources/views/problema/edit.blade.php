@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Condição</h1>
    
    <form id="editarProblemaForm" action="{{ route('problema.update', $problema->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id" id="paciente_id" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $problema->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_identificacao" class="form-label">Data de Identificação</label>
            <input type="date" class="form-control" name="data_identificacao" id="data_identificacao" value="{{ $problema->data_identificacao }}" required>
        </div>

        <div class="mb-3">
            <label for="problema" class="form-label">Condição</label>
            <input type="text" class="form-control" name="problema" id="problema" value="{{ $problema->problema }}" required>
        </div>

        <div class="mb-3">
            <label for="evolucao" class="form-label">Evolução</label>
            <textarea class="form-control" name="evolucao" id="evolucao" rows="4" required>{{ $problema->evolucao }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Condição</button>
        <a href="{{ route('problema.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection