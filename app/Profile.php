<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public function picture(){
        return $this->hasOne(File::class,'id','profile_picture');

    }



}
