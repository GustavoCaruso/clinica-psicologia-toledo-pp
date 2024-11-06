@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Avaliações Psicológicas</h1>

    <!-- Botão para criar nova avaliação -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('avaliacao.create') }}" class="btn btn-primary">Novo Registro</a>
    </div>

    <!-- Tabela de Avaliações -->
    <div class="table-responsive">
        <table id="avaliacoesTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avaliacoes as $avaliacao)
                    <tr>
                        <!-- Data da Avaliação -->
                        <td>{{ \Carbon\Carbon::parse($avaliacao->data_avaliacao)->format('d/m/Y') }}</td>

                        <!-- Nome do Paciente (Avaliacao tem relação com Paciente) -->
                        <td>{{ $avaliacao->paciente->nome }}</td>

                        <!-- Ações: Visualizar e Editar -->
                        <td>
                            <a href="{{ route('avaliacao.show', $avaliacao->id) }}" class="btn btn-info btn-sm" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('avaliacao.edit', $avaliacao->id) }}" class="btn btn-warning btn-sm" title="Editar">
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
        $('#avaliacoesTable').DataTable({
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
