<?php

namespace App;

class Comment extends Model
{
    // $comment->post;
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
