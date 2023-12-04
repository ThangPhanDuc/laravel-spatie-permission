<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);

    }   
    public function index()
    {
        $posts = Post::where('public', 1)->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function edit(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        $this->authorize('edit articles', $post);

        return view('posts.edit', compact('post'));
    }
}
