@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Encaminhamento</h1>

    <form action="{{ route('encaminhamento.update', $encaminhamento->id) }}" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" required class="form-select">
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $encaminhamento->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_encaminhamento" class="form-label">Data do Encaminhamento</label>
            <input type="date" name="data_encaminhamento" id="data_encaminhamento" value="{{ $encaminhamento->data_encaminhamento }}" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="profissional_encaminhado" class="form-label">Profissional Encaminhado</label>
            <input type="text" name="profissional_encaminhado" id="profissional_encaminhado" value="{{ $encaminhamento->profissional_encaminhado }}" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao_encaminhamento" class="form-label">Descrição do Encaminhamento</label>
            <textarea name="descricao_encaminhamento" id="descricao_encaminhamento" rows="4" required class="form-control">{{ $encaminhamento->descricao_encaminhamento }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Encaminhamento</button>
        <a href="{{ route('encaminhamento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
