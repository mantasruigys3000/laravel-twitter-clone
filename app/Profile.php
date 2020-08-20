<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    /*
    public function picture(){
        return $this->hasOne(File::class,'id','profile_picture');

    }

    public function follows(){
        return $this->hasMany(Follow::class);
    }

    public function followsarray(){
        return $this->follows->pluck('follow_id');

    }

    public function likes(){
        return $this->belongsToMany(Post::class,'likes','profile_id','post_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class,'profile_id');

    }

    */






}
