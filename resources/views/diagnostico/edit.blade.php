@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Diagnóstico</h1>
    
    <form id="editarDiagnosticoForm" action="{{ route('diagnostico.update', $diagnostico->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id" id="paciente_id" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $diagnostico->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_diagnostico" class="form-label">Data do Diagnóstico</label>
            <input type="date" class="form-control" name="data_diagnostico" id="data_diagnostico" value="{{ $diagnostico->data_diagnostico }}" required>
        </div>

        <div class="mb-3">
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <input type="text" class="form-control" name="diagnostico" id="diagnostico" value="{{ $diagnostico->diagnostico }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao">{{ $diagnostico->descricao }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Diagnóstico</button>
        <a href="{{ route('diagnostico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('editarDiagnosticoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Confirmar atualização',
            text: "Deseja realmente atualizar este diagnóstico?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, atualizar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>
@endsection
