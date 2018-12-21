<?php

namespace App;

use Carbon\Carbon;

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

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month'] ?? false) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }   

        if ($year = $filters['year'] ?? false) {
            $query->whereYear('created_at', $year);
        }
    }
}
