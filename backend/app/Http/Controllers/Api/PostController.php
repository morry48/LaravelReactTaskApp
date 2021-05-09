<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    public function create(Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->content = $request->content;
        $post->save();
        return response()->json($post, 200);
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->id);
        return $post;
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);
        $post->name = $request->name;
        $post->content = $request->content;
        $post->save();
        return response()->json($post, 200);
    }

    public function delete(Request $request)
    {
        $post =  Post::find($request->id);
        $post->delete();
        $posts = Post::all();
        return $posts;
    }
}
