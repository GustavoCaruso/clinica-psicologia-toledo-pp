@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Tratamentos</h1>

    @if (session('insercao'))
        <div class="alert alert-success">{{ session('insercao') }}</div>
    @endif
    @if (session('atualizacao'))
        <div class="alert alert-success">{{ session('atualizacao') }}</div>
    @endif
    @if (session('remocao'))
        <div class="alert alert-success">{{ session('remocao') }}</div>
    @endif

    <!-- Botão para adicionar novo tratamento -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('tratamento.create') }}" class="btn btn-primary">Iniciar Novo Tratamento</a>
    </div>

    <div class="table-responsive">
        <table id="tratamentosTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Data de Início</th>
                    <th>Objetivos</th>
                    <th>Progresso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tratamentos as $tratamento)
                <tr>
                    <td>{{ $tratamento->id }}</td>
                    <td>{{ $tratamento->paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($tratamento->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ $tratamento->objetivos }}</td>
                    <td>{{ $tratamento->progresso }}</td>
                    <td>
                        <a href="{{ route('tratamento.show', $tratamento->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('tratamento.edit', $tratamento->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<!-- Incluindo DataTables CSS e JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tratamentosTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            },
            "order": [[ 2, "desc" ]] // Ordena pela data de início (coluna 2) em ordem decrescente
        });
    });
</script>
@endsection
