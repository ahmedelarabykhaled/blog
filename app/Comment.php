<?php

namespace App;


use App\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function users()
    {
    	return $this->hasOne(User::class , 'id' , 'user_id');
    }
}
