<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //post relationship function --> a user has many posts
    public function user() {
    	return $this->belongsTo(User::class);
    }
}
