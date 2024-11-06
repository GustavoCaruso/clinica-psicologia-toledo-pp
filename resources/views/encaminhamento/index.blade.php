@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Encaminhamentos</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('encaminhamento.create') }}" class="btn btn-primary">Novo Encaminhamento</a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table id="encaminhamentosTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Data do Encaminhamento</th>
                    <th>Profissional Encaminhado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($encaminhamentos as $encaminhamento)
                <tr>
                    <td>{{ $encaminhamento->id }}</td>
                    <td>{{ $encaminhamento->paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($encaminhamento->data_encaminhamento)->format('d/m/Y') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($encaminhamento->profissional_encaminhado, 30, '...') }}</td>
                    <td>
                        <a href="{{ route('encaminhamento.show', $encaminhamento->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('encaminhamento.edit', $encaminhamento->id) }}" class="btn btn-warning btn-sm" title="Editar">
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#encaminhamentosTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            }
        });
    });
</script>
@endsection
