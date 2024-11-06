@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalhes da Sessão de Terapia</h2>

    <div class="mt-6 space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Paciente</label>
            <p>{{ $terapia->paciente->nome }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Data da Sessão</label>
            <p>{{ \Carbon\Carbon::parse($terapia->data_sessao)->format('d/m/Y') }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Notas da Sessão</label>
            <p>{{ $terapia->notas }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Técnicas Utilizadas</label>
            <p>{{ $terapia->tecnicas_utilizadas }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('terapia.edit', $terapia->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('terapia.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
