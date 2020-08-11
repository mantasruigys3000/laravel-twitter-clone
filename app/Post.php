<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $appends = ['ownerName'];

    public function user(){
        return $this->belongsTo(Profile::Class);
    }


    public function getOwnerNameAttribute(){

        return $this->user->username;

    }


}
