<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo - Clínica de Psicologia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Garantindo que o gradiente preencha a tela completamente e sem rolagem */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100vh;
            width: 100vw;
            overflow: hidden; /* Impede qualquer rolagem */
            background: linear-gradient(135deg, #FF9933, #0E6BAE);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Figtree, sans-serif;
            color: #fff;
        }

        .welcome-container {
            max-width: 600px;
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.85); /* Fundo semitransparente */
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: #fff;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.15rem;
            color: #dcdcdc;
            margin-top: 1rem;
            line-height: 1.6;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .nav-links a {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #fff;
            background: #00796b;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.2s;
        }

        .nav-links a:hover {
            background: #004d40;
            transform: scale(1.05);
        }

        footer {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #78909c;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h1 class="title">Bem-vindo ao Sistema de Gestão para Psicólogos</h1>
        <p class="subtitle">
            Este sistema oferece uma plataforma eficiente para gerenciar informações de pacientes, controlar sessões de terapia, diagnósticos, prescrições, encaminhamentos e agendamentos. Acessível apenas para psicólogos, cada profissional tem acesso somente aos dados dos pacientes que ele cadastrou.
        </p>

        <!-- Botões de navegação -->
        @if (Route::has('login'))
            <nav class="nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar-se</a>
                    @endif
                @endauth
            </nav>
        @endif

        <footer>
            &copy; {{ date('Y') }} Sistema de Gestão para Psicólogos. Todos os direitos reservados.
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
