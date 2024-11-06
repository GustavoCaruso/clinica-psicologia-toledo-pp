@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Prescrições</h1>

    <!-- Botão alinhado à direita -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('prescricao.create') }}" class="btn btn-primary">Adicionar Prescrição</a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table id="prescricoesTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Data da Prescrição</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prescricoes as $prescricao)
                <tr>
                    <td>{{ $prescricao->id }}</td>
                    <td>{{ $prescricao->paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($prescricao->data_prescricao)->format('d/m/Y') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($prescricao->descricao_prescricao, 30, '...') }}</td>
                    <td>
                        <a href="{{ route('prescricao.show', $prescricao->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('prescricao.edit', $prescricao->id) }}" class="btn btn-warning btn-sm" title="Editar">
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
<!-- DataTables Script -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#prescricoesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            }
        });
    });
</script>
@endsection
