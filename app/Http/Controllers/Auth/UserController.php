<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request){
            $user =  User::where('username','like','%'.$request->get('search').'%')->get();
            return new UserResource($user);

    }

    public function update(Request $request){
        $user = auth()->user();
        $user->bio = $request->get('bio');

        if($request->get('pic') != null){
            $user->profile_picture = $request->get('pic')->id;
        }

        $user->save();


        return response()->json(auth()->user());
    }

    public function show( $username){
        $user = User::where('username',$username)->FirstOrFail();

        return new UserResource($user);

    }

    public function authUser( ){
        if(!auth()->check()) return null;

        $user = auth()->user();

        return new UserResource($user);

    }

    public function getPosts(User $user){
        //return $userId->posts;
        //dd($user);
        return PostResource::collection($user->posts->sortByDesc('created_at'));

    }


}
