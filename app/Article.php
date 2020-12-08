<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category()
    {	
    	//Article belongs To Category
    	return $this->belongsTo('App\Category');
    }

    public function comments()
    {
    	//Article has many Comment
    	return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
