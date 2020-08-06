<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $appends = ['ownerName'];

    public function user(){
        return $this->belongsTo(User::Class);
    }


    public function getOwnerNameAttribute(){

        return $this->user->username;

    }


}
