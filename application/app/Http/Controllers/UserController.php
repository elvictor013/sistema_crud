<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
//use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){

    //   $users = User::orderByDesc('id')->get();
         $users = User::orderByDesc('id')->paginate(1);

        return view('users.index', ['users' => $users]);
    }

    public function show(User $user){
        return view('users.show', ['user' => $user]);
    }


    public function create(){
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $request->validated();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.index')->with('success', 'usuário cadastrado com sucesso!');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        //validar as informações no banco
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // redirecionar o usuario, enviar a mensagem de sucesso
        return redirect()->route('user.show', ['user' => $user->id ])->with('success', 'usuário editado com sucesso!');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user.index')->with('success', 'usuário apagado com sucesso!');
    }
}
