<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- FullCalendar CSS e DataTables CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <!-- jQuery, DataTables e FullCalendar JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Bootstrap e ícones -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    /* Estilos personalizados */
    .navbar .dropdown-menu {
      position: absolute;
      right: 0;
      top: 100%;
      z-index: 1050;
      transform: translateY(5px);
    }

    #sidebarMenu {
      height: 100vh;
      overflow-y: auto;
      width: 250px;
      position: fixed;
      top: 56px;
      left: 0;
      background-color: #f8f9fa;
      z-index: 1045;
    }

    main {
      margin-left: 250px;
      padding-top: 20px;
    }

    @media (max-width: 768px) {
      #sidebarMenu {
        top: 0;
        width: 75%;
        height: 100vh;
        position: fixed;
        left: 0;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        z-index: 1050;
      }

      #sidebarMenu.show {
        transform: translateX(0);
      }

      main {
        margin-left: 0;
      }
    }
  </style>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
  <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">{{ config('app.name', 'Company name') }}</a>

    <div class="navbar-nav ms-auto me-3">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name ?? 'User' }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item text-primary" href="{{ route('profile.edit') }}">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="confirmLogout()">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>

    <!-- Botão para abrir o sidebar em telas pequenas -->
    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false">
          <i class="bi bi-search"></i>
        </button>
      </li>
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" onclick="document.getElementById('sidebarMenu').classList.toggle('show')">
          <i class="bi bi-list"></i>
        </button>
      </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                <i class="bi bi-house-fill me-2"></i> Dashboard
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('paciente.index') }}">
                <i class="bi bi-person-lines-fill me-2"></i> Pacientes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('agenda.index') }}">
                <i class="bi bi-calendar-event me-2"></i> Agenda
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('avaliacao.index') }}">
                <i class="bi bi-clipboard-check me-2"></i> Avaliação
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('diagnostico.index') }}">
                <i class="bi bi-file-earmark-medical me-2"></i> Diagnóstico
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('problema.index') }}">
                <i class="bi bi-exclamation-circle me-2"></i> Condição
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('prescricao.index') }}">
                <i class="bi bi-prescription me-2"></i> Prescrição
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('terapia.index') }}">
                <i class="bi bi-heart-pulse me-2"></i> Terapia
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('tratamento.index') }}">
                <i class="bi bi-capsule me-2"></i> Tratamento
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('encaminhamento.index') }}">
                <i class="bi bi-arrow-right-circle me-2"></i> Encaminhamento
              </a>
            </li>

          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
    </div>
  </div>

  <!-- Bootstrap bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Inicialização do DataTables com tradução para português do Brasil -->
  <script>
    $(document).ready(function() {
      $('#diagnosticosTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#tratamentosTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#prescricoesTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#terapiasTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#problemasTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#pacientesTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#avaliacoesTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
      $('#encaminhamentosTable').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
      });
    });

    function confirmLogout() {
      Swal.fire({
        title: 'Tem certeza?',
        text: "Você realmente deseja sair?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, sair!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
      });
    }
  </script>
</body>

</html>