<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //in tutorial a base Model class is created with an empty guard.
    //in order to use Post::create we need to assign these
    protected $fillable = ['title', 'body'];

    //protected $guarded = [] \\this is like the reverse of the above

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
