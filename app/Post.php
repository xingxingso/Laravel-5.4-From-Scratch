<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = ['title', 'body'];
    // protected $guarded  = []; //['user_id'];

    public function comments()
    {
        // return $this->hasMany('App\Comment');
        return $this->hasMany(Comment::class);
    }
}
