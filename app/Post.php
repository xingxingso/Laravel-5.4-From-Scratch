<?php

namespace App;

class Post extends Model
{
    // protected $fillable = ['title', 'body'];
    // protected $guarded  = []; //['user_id'];

    public function comments()
    {
        // return $this->hasMany('App\Comment');
        return $this->hasMany(Comment::class);
    }

    public function user() // $post->user  $comment->post->user
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));

        // Comment::create([
        //     'body'    => $body,
        //     'post_id' => $this->id
        // ]);
    }
}
