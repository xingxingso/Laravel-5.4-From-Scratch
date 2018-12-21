<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::latest()->get();
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    // public function show($id)
    public function show(Post $post)
    {
        // $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // dd(request()->all());
        // dd(request('body'));
        // dd(request(['title', 'body']));

        // Create a new post using the request data
        // $post = new \App\Post;
        // $post = new Post;

        // $post->title = request('title');
        // $post->body = request('body');

        // Save it to the database
        // $post->save();

        // Post::create([
        //     'title' => request('title'),
        //     'body'  => request('body'),
        // ]);

        $this->validate(request(), [
            'title' => 'required', //'|max:10'
            'body'  => 'required'
        ]);

        // // Post::create(request(['title', 'body']));
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     // 'user_id' => auth()->user()->id
        //     'user_id' => auth()->id()
        // ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // And then redirect to the home page.
        return redirect('/');
    }
}
