<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}

