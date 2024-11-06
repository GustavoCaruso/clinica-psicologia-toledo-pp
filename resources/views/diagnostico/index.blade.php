@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Diagnósticos</h1>

    <!-- Botão para criar novo diagnóstico -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('diagnostico.create') }}" class="btn btn-primary">Novo Diagnóstico</a>
    </div>

    <!-- Tabela de Diagnósticos -->
    <div class="table-responsive">
        <table id="diagnosticosTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Data</th>
                    <th>Diagnóstico</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosticos as $diagnostico)
                    <tr>
                        <td>{{ $diagnostico->id }}</td>
                        <td>{{ $diagnostico->paciente->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($diagnostico->data_diagnostico)->format('d/m/Y') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($diagnostico->diagnostico, 30, '...') }}</td>
                        <td>
                            <a href="{{ route('diagnostico.show', $diagnostico->id) }}" class="btn btn-info btn-sm" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('diagnostico.edit', $diagnostico->id) }}" class="btn btn-warning btn-sm" title="Editar">
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

@section('styles')
<!-- CSS para DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('scripts')
<!-- jQuery e DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        // Inicializa o DataTable apenas uma vez
        $('#diagnosticosTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            },
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endsection
