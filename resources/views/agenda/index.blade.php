@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Agendamentos</h1>

    <!-- Botão alinhado à direita -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('agenda.create') }}" class="btn btn-primary">Novo Agendamento</a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table id="agendamentosTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->id }}</td>
                    <td>{{ $agenda->paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($agenda->data_agendamento)->format('d/m/Y') }}</td>
                    <td>{{ $agenda->hora_agendamento }}</td>
                    <td>
                        <a href="{{ route('agenda.show', $agenda->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts para DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#agendamentosTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            }
        });
    });
</script>
@endsection
