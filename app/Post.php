<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $appends = ['likesCount'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(Profile::class,'likes','post_id','profile_id');

    }




    public function getLikesCountAttribute(){
        return  $this->likes->count();

    }



}
