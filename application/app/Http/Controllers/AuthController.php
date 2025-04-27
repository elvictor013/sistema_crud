<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Validar o usuário e a senha com as informações do banco de dados
        $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Verificar se o usuário foi autenticado
        if (!$authenticated) {
            // Redirecionar o usuário para página anterior "login", enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválido!');
        }

        // Obter o usuário autenticado
        $user = Auth::user();
        $user = User::find($user->id);

        // Redirecionar o usuário
        return redirect()->route('user.index');
    }

    public function create()
    {

        // Carregar a VIEW
        return view('login.create');
    }

    public function store(UserRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Cadastrar no banco de dados na tabela usuários
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }


    public function destroy()
    {
        // Deslogar o usuário
        Auth::logout();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('login')->with('success', 'Deslogado com sucesso!');
    }
}
