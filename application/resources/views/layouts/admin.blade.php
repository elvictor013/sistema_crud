<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <title>Página</title>

  <style>
    body {
      background-color: #f8f9fa; /* cor de fundo clara */
    }

    header {
      margin-bottom: 2rem;
    }

    .container {
      padding-top: 2rem;
      padding-bottom: 2rem;
    }

    .nav-link {
      font-weight: 500;
    }
  </style>
</head>
<body>

<header class="p-3 text-bg-primary">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <i class="bi bi-bootstrap-fill" style="font-size: 2rem;"></i>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Listar</a></li>
        <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Usuário</a></li>
      </ul>

      <div class="text-end">
        <a href="{{ route('login.destroy') }}" class="btn btn-outline-light me-2">Sair</a>
      </div>
    </div>
  </div>  
</header>

<div class="container">
  @yield('content')
</div>

</body>
</html>
