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
        return $this->belongsToMany(User::class,'likes','post_id','user_id');

    }




    public function getLikesCountAttribute(){
        return  $this->likes->count();

    }



}
