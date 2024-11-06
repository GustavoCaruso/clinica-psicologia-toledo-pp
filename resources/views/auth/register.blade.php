<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar - Clínica de Psicologia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      html, body {
        height: 100%;
        background: linear-gradient(135deg, #FF9933, #0E6BAE);
      }

      body {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
        color: #fff;
      }

      .form-register {
        max-width: 330px;
        padding: 15px;
        margin: auto;
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 8px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
      }

      .form-register .form-floating:focus-within {
        z-index: 2;
      }

      .form-register input[type="text"],
      .form-register input[type="email"],
      .form-register input[type="password"] {
        margin-bottom: 10px;
      }

      .text-center {
        text-align: center;
      }

      .text-muted {
        color: #6c757d !important;
      }

      .b-logo {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
      }

      .b-logo img {
        max-width: 100px;
        height: auto;
      }
    </style>
  </head>
  <body class="text-center">

    <main class="form-register w-100 m-auto">
      <div class="b-logo">
        <img src="{{ asset('imagens/icone-psicologia.png') }}" alt="Logo de Psicologia">
      </div>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Registrar-se</h1>

        <!-- Nome -->
        <div class="form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" value="{{ old('name') }}" required autofocus>
          <label for="name">Nome completo</label>
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" value="{{ old('email') }}" required>
          <label for="email">Endereço de Email</label>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
          <label for="password">Senha</label>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Senha -->
        <div class="form-floating">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha" required>
          <label for="password_confirmation">Confirme a Senha</label>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botão de registro -->
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrar</button>

        <!-- Botão para login -->
        <a href="{{ route('login') }}" class="w-100 btn btn-lg btn-secondary mt-2">Já registrado? Faça login</a>

        <!-- Footer -->
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
      </form>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
