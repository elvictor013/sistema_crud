<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::with(['posts'])->get();
        return UserResource::collection($users);
    }

    public function store(Request $request) {
        try {
            $user = User::create([
                'name'  => $request->name,
                'email' => $request->email,
                'password'  => Hash::make($request->password)
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'data'          => new UserResource($user),
                'access_token'  => $token,
                'token_type'    => 'Bearer'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'error'=> true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function show(Request $request) {
        $user = User::find($request->route('id'));
        return new UserResource($user);
    }
}
