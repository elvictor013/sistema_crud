<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login / Cadastro</title>

  <style>
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      background-color: #0d6efd; /* azul bootstrap */
    }

    .form-signin {
      width: 100%;
      max-width: 380px;
      padding: 2rem;
      background-color: #f8f9fa; /* fundo claro do formulário */
      border-radius: 0.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin img {
      width: 220px;
      height: auto;
      margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>

  @yield('content')
  

</body>
</html>
