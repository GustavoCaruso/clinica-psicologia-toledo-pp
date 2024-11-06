@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Prescrição</h1>
    
    <form id="editarPrescricaoForm" action="{{ route('prescricao.update', $prescricao->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <!-- Seleção do Paciente -->
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id" id="paciente_id" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $prescricao->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Data da Prescrição -->
        <div class="mb-3">
            <label for="data_prescricao" class="form-label">Data da Prescrição</label>
            <input type="date" class="form-control" name="data_prescricao" id="data_prescricao" value="{{ $prescricao->data_prescricao }}" required>
        </div>

        <!-- Descrição da Prescrição -->
        <div class="mb-3">
            <label for="descricao_prescricao" class="form-label">Descrição da Prescrição</label>
            <textarea class="form-control" name="descricao_prescricao" id="descricao_prescricao" rows="4" required>{{ $prescricao->descricao_prescricao }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Prescrição</button>
        <a href="{{ route('prescricao.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('editarPrescricaoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Confirmar atualização',
            text: "Deseja realmente atualizar esta prescrição?",
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
