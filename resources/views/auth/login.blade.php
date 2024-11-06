<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Clínica de Psicologia</title>

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

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: auto;
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 8px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"],
    .form-signin input[type="password"] {
      margin-bottom: -1px;
      border-radius: 0;
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

  <main class="form-signin w-100 m-auto">
    <div class="b-logo">
      <img src="{{ asset('imagens/icone-psicologia.png') }}" alt="Logo de Psicologia">
    </div>

    <form method="POST" action="/login">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Faça login</h1>

      <!-- Email -->
      <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required autofocus>
        <label for="email">Endereço de Email</label>
      </div>

      <!-- Senha -->
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
        <label for="password">Senha</label>
      </div>

      <!-- Checkbox "Lembrar de mim" -->
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>

      <!-- Botão de Login -->
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

      <!-- Botão de Registro -->
      <a href="{{ route('register') }}" class="w-100 btn btn-lg btn-secondary mt-2">Registrar-se</a>

      <!-- Footer -->
      <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>

  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
