<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    public function index() {
        return PostResource::collection(Post::all());
    }

    public function store(StorePostRequest $request) {
        try {
            $post = Post::create([
                'descricao' => $request->descricao,
                'conteudo'  => $request->conteudo
            ]);
    
            return response()->json([
                'error' => false,
                'message'   => 'Postagem cadastrada com sucesso!',
                'post'  => $post
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error'=> true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
