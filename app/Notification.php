<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id');
    }

    public function from(){
        return $this->belongsTo(Profile::class,'from_profile_id');

    }
}
