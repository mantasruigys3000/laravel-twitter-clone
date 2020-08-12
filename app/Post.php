<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $appends = ['ownerName','likesCount'];

    public function user(){
        return $this->belongsTo(Profile::Class);
    }

    public function likes(){
        return $this->belongsToMany(Profile::class,'likes','post_id','profile_id');

    }


    public function getOwnerNameAttribute(){

        return $this->user->username;

    }

    public function getLikesCountAttribute(){
        return  $this->likes->count();

    }



}
