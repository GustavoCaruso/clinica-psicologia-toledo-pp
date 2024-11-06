@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <!-- Cartões de Resumo -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total de Pacientes</h5>
                    <p class="card-text fs-2">{{ $totalPacientes }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total de Tratamentos</h5>
                    <p class="card-text fs-2">{{ $totalTratamentos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total de Prescrições</h5>
                    <p class="card-text fs-2">{{ $totalPrescricoes }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sessões de Terapia</h5>
                    <p class="card-text fs-2">{{ $totalTerapias }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela de Registros Recentes -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Últimos Tratamentos</h5>
        </div>
        <div class="card-body table-responsive">
            <table id="recentRecordsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Data de Início</th>
                        <th>Objetivos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentTratamentos as $tratamento)
                    <tr>
                        <td>{{ $tratamento->id }}</td>
                        <td>{{ $tratamento->paciente->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($tratamento->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($tratamento->objetivos, 50, '...') }}</td>
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
        $('#recentRecordsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            },
            "order": [[ 2, "desc" ]] // Ordena pela data de início em ordem decrescente
        });
    });
</script>
@endsection
