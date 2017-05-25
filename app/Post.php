<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //in order to use Post::create we need to assign these
    protected $fillable = ['title', 'body'];

    //protected $guarded = [] \\this is like the reverse of the above
}
