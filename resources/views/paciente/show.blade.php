@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Paciente</h1>
    
    <p><strong>Nome:</strong> {{ $paciente->nome }}</p>
    <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</p>
    <p><strong>Endereço:</strong> {{ $paciente->endereco }}</p>
    <p><strong>Telefone:</strong> {{ $paciente->telefone }}</p>
    <p><strong>E-mail:</strong> {{ $paciente->email }}</p>

    <a href="{{ route('paciente.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
