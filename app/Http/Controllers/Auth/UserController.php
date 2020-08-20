<?php

namespace App\Http\Controllers;

use App\Follow;
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
            $user =  UserResource::collection( User::where('username','like','%'.$request->get('search').'%')->get());
            return $user;

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

    public function getFollowingPosts(){
        if(auth()->check()){

        }
    }

    public function toggleLike(){

    }

    public function isFollowing(User $user){
       // dd(auth()->user()->follows);
        return auth()->user()->follows->contains($user);

    }

    public function toggleFollow(User $user){

        $follow = new Follow();

        if($this->isFollowing($user)){
            $follow = Follow::where(['user_id' => auth()->user()->id ,'follow_id' => $user->id])->FirstOrFail();
            $follow->delete();
        }else{
            $follow->user_id = auth()->user()->id;
            $follow->follow_id = $user->id;
            $follow->save();
        }




    }

}
