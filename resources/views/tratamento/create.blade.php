@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Iniciar Novo Tratamento</h1>

    <form id="tratamentoForm" action="{{ route('tratamento.store') }}" method="POST">
        @csrf

        <!-- Seleção do Paciente -->
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-select" required>
                <option value="">Selecione o Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Data de Início -->
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <!-- Objetivos do Tratamento -->
        <div class="mb-3">
            <label for="objetivos" class="form-label">Objetivos</label>
            <textarea name="objetivos" id="objetivos" rows="4" class="form-control" required></textarea>
        </div>

        <!-- Progresso -->
        <div class="mb-3">
            <label for="progresso" class="form-label">Progresso</label>
            <textarea name="progresso" id="progresso" rows="4" class="form-control" required></textarea>
        </div>

        <!-- Botões de Ação -->
        <button type="submit" class="btn btn-primary">Iniciar Tratamento</button>
        <a href="{{ route('tratamento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- SweetAlert2 script para confirmação -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('tratamentoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Confirmar ação',
            text: "Deseja iniciar este tratamento?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, iniciar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>
@endsection
