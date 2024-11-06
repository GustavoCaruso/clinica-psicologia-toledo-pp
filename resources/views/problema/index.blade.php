@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Condições Identificadas</h1>

    <!-- Botão alinhado à direita -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('problema.create') }}" class="btn btn-primary">Identificar Nova Condição</a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table id="problemasTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Data de Identificação</th>
                    <th>Condição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($problemas as $problema)
                <tr>
                    <td>{{ $problema->id }}</td>
                    <td>{{ $problema->paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($problema->data_identificacao)->format('d/m/Y') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($problema->problema, 30, '...') }}</td>
                    <td>
                        <a href="{{ route('problema.show', $problema->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('problema.edit', $problema->id) }}" class="btn btn-warning btn-sm" title="Editar">
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
<!-- Inclusão do CSS do DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('scripts')
<!-- Inclusão do jQuery e DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#problemasTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese-Brasil.json'
            }
        });
    });
</script>
@endsection