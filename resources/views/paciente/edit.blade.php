@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Paciente</h1>
    
    <form id="editarPacienteForm" action="{{ route('paciente.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $paciente->nome }}" required>
        </div>

        <!-- Data de Nascimento -->
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{ $paciente->data_nascimento }}" required>
        </div>

        <!-- Endereço -->
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco" value="{{ $paciente->endereco }}" required>
        </div>

        <!-- Telefone -->
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $paciente->telefone }}" required>
        </div>

        <!-- E-mail -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $paciente->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Paciente</button>
        <a href="{{ route('paciente.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('editarPacienteForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Confirmar atualização',
            text: "Deseja realmente atualizar este paciente?",
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
