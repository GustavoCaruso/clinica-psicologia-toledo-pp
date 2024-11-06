@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Prescrição</h1>
    
    <form id="prescricaoForm" action="{{ route('prescricao.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id" id="paciente_id" required>
                <option value="">Selecione o Paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_prescricao" class="form-label">Data da Prescrição</label>
            <input type="date" class="form-control" name="data_prescricao" id="data_prescricao" required>
        </div>

        <div class="mb-3">
            <label for="descricao_prescricao" class="form-label">Descrição da Prescrição</label>
            <textarea class="form-control" name="descricao_prescricao" id="descricao_prescricao" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Prescrição</button>
        <a href="{{ route('prescricao.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- SweetAlert2 script para confirmação -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('prescricaoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Confirmar ação',
            text: "Deseja salvar esta prescrição?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, salvar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>
@endsection
