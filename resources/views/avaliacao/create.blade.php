@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Avaliação Psicológica</h1>

    <!-- Formulário de Criação de Avaliação -->
    <form action="{{ route('avaliacao.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Seleção do Paciente -->
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" required class="form-select">
                <option value="">Selecione o Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Data da Avaliação -->
        <div class="mb-3">
            <label for="data_avaliacao" class="form-label">Data da Avaliação</label>
            <input type="date" name="data_avaliacao" id="data_avaliacao" required class="form-control">
        </div>

        <!-- Observações da Avaliação -->
        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" rows="4" class="form-control"></textarea>
        </div>

        <!-- Botão de Submissão -->
        <div>
            <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
            <a href="{{ route('avaliacao.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
