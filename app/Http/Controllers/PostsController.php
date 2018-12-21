<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::latest()->get();
        // $posts = Post::latest();

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month); // March => 3, May => 5
        //     // $posts->whereMonth('created_at', $month);
        // }

        // if ($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();
        
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // Temporary.
        $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view('posts.index', compact('posts', 'archives'));
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
