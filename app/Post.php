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

    public function addCOmment($body){

        $this->comments()->create(compact('body'));


/*lognform way but see above where eloquent comments referenced as method->create() or other eloquent method instead of as property ( lazy loaded)
sets post id automatically because of relationship
        Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);
*/

    }
}
