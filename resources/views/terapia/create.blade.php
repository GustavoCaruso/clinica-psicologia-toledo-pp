@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Criar Nova Sessão de Terapia</h2>

    <form action="{{ route('terapia.store') }}" method="POST" class="mt-6 space-y-6">
        @csrf

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" required class="form-select">
                <option value="">Selecione o Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_sessao" class="form-label">Data da Sessão</label>
            <input type="date" name="data_sessao" id="data_sessao" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="notas" class="form-label">Notas da Sessão</label>
            <textarea name="notas" id="notas" rows="4" required class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="tecnicas_utilizadas" class="form-label">Técnicas Utilizadas</label>
            <textarea name="tecnicas_utilizadas" id="tecnicas_utilizadas" rows="4" required class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Criar Sessão</button>
    </form>
</div>
@endsection
