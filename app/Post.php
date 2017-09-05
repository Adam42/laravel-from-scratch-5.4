<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    /**
     *  Saves comment and associates it with a post
     *  @param string
     */
    public function addComment($body){

        $this->comments()->create(compact('body'));


/*lognform way but see above where eloquent comments referenced as method->create() or other eloquent method instead of as property ( lazy loaded)
sets post id automatically because of relationship
        Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);
*/

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {

        if($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

    }

    public static function archives()
    {
        return static::selectRaw(' year(created_at)  year,  monthname(created_at)  month,  count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

}
