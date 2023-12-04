<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostManagementController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.manage.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('posts.manage.edit', compact('post'));
    }

    public function updateStatus(Request $request, Post $post)
    {
        $post->update([
            'published' => $request->input('published'),
        ]);

        return redirect()->route('manage.posts');
    }
}
