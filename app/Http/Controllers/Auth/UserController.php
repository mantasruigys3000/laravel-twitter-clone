<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request){
            return User::where('username','like','%'.$request->get('search').'%')->get();

    }

    public function update(Request $request){
        $user = auth()->user();
        $user->bio = $request->get('bio');
        $user->profile_picture = $request->get('pic');
        $user->save();


        return response()->json(auth()->user());
    }

    public function show( $username){
        $user = User::where('username',$username)->FirstOrFail();

        return response()->json($user);

    }


}
