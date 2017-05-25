<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {

        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id
        ]);

        return back();
    }
}
