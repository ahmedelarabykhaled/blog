<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Image;
use App\Comment;
use App\User;

class Post extends Model
{
    public function images()
    {
    	return $this->hasMany(Image::class ,'post_id','id');
    }
    public function comments()
    {
    	return $this->hasMany(Comment::class,'post_id','id');
    }
    public function users()
    {
    	return $this->hasOne(User::class , 'id' , 'user_id');
    }
}
