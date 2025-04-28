@extends('layouts.auth')

@section('content')

<main class="form-signin w-100 m-auto text-center bg-light rounded">
    <h1 class="h3 mb-3 fw-normal">Área Restrita</h1>
    <x-alert />
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-floating mb-4">
            <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu E-mail de usuário" value="{{old ('email')}}">
            <label for="email">Usuário</label>
        </div>

        <div class="mb-4">
            <div class="input-group">
                <div class="form-floating flex-grow-1">
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Senha com no mínimo 6 caracteres">
                    <label for="password">Senha</label>
                </div>
                <span class="input-group-text" role="button" onclick="togglePassword('password', this)">
                    <i class="bi bi-eye"></i>
                </span>
            </div>
        </div>

        <!-- <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Lembrar-me
            </label>
        </div> -->
        <button class="btn btn-primary w-100 py-2 mb-4" type="submit">Acessar</button>
        <!-- <p class="mt-5 mb-3 text-body-secondary">&copy; </p> -->

        <a href="{{ route('login.create-user') }}" class="text-decoration-none">Cadastrar</a>
    </form>
</main>
<script>
    function togglePassword(fieldId, button) {
        const input = document.getElementById(fieldId);
        const icon = button.querySelector('i');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>


@endsection