<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public function picture(){
        return $this->hasOne(File::class,'id','profile_picture');

    }

    public function follows(){
        return $this->belongsToMany(User::class,'follows','profile_id','follow_id');

    }

    public function followsarray(){
        return $this->follows->pluck('follow_id');

    }

    public function likes(){
        return $this->belongsToMany(Post::class,'likes','profile_id','post_id');
    }





}
