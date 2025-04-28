@extends('layouts.admin')
@section('content')

<div class="card mt-4 mb-4 border-light shadow">

    <div class="card-header hstack gap-2">
        <span>Editar</span>
        <span class="ms-auto d-sm-flex flex-row">
            <a href="{{ route('user.index')}}" class="btn btn-info btn-sm me-1">Lista de Cadastro</a>
            <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm me-1">Visualizar</a>

            <!-- <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
            </form> -->
        </span>
    </div>

    <div class="card-body">
        <x-alert />

        <form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-12">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome Completo" value="{{ old('name', $user->name) }}">
            </div>

            <div class="col-md-12">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Melhor E-mail do Usuário" value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-1">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Senha com no mínimo 6 caracteres">
                        <label for="password">Senha</label>
                    </div>
                    <span class="input-group-text toggle-password" data-target="password" role="button">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <div class="mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-1">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            placeholder="Confirma a senha">
                        <label for="password_confirmation">Confirma Senha</label>
                    </div>
                    <span class="input-group-text toggle-password" data-target="password_confirmation" role="button">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
            </div>
        </form>
    </div>

</div>
<script>
document.querySelectorAll('.toggle-password').forEach(button => {
  button.addEventListener('click', function() {
    const fieldId = this.getAttribute('data-target');
    const input = document.getElementById(fieldId);
    const icon = this.querySelector('i');

    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove('bi-eye');
      icon.classList.add('bi-eye-slash');
    } else {
      input.type = "password";
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    }
  });
});
</script>

@endsection