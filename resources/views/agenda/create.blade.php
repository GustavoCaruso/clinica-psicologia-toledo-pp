@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Novo Agendamento</h1>
    
    <form id="criarAgendamentoForm" action="{{ route('agenda.store') }}" method="POST">
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
            <label for="data_agendamento" class="form-label">Data do Agendamento</label>
            <input type="date" class="form-control" name="data_agendamento" id="data_agendamento" required>
        </div>

        <div class="mb-3">
            <label for="hora_agendamento" class="form-label">Hora do Agendamento</label>
            <input type="time" class="form-control" name="hora_agendamento" id="hora_agendamento" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Agendamento</button>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('criarAgendamentoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Confirmar criação',
            text: "Deseja realmente criar este agendamento?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, criar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>
@endsection
