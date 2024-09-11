<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return PostResource::collection(Post::all());
    }

    public function store(StorePostRequest $request) {
        try {
            $post = Post::create($request->all());
    
            return new PostResource($post);
        } catch (Exception $e) {
            return response()->json([
                'error'=> true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(StorePostRequest $request) {
        $post = Post::find($request->route('id'));
        $post->update($request->all());

        return new PostResource($post);
    }

    public function show(Request $request) {
        $post = Post::find($request->route('id'));
        return new PostResource($post);
    }
}
