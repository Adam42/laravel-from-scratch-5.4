<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function isComplete()
    {
    	return false;
    }
/*
    public static function incomplete(){
    	return static::where('completed', 0)->get();
    }
*/

    /* Using query scopes instead to allow chaining */

    public function scopeIncomplete($query)
    {
    	return  $query->where('completed', 0);
    }

}
