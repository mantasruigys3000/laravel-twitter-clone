<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function update(Request $request){
        $user = auth()->user();
        $user->bio = $request->get('bio');
        $user->profile_picture = $request->get('pic');
        $user->save();


        return response()->json(auth()->user());
    }
}
