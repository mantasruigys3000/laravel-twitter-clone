<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function index(Request  $request){
        //return  response()->json(Post::all());
        return PostResource::collection(Post::whereIn('user_id',json_decode( $request->get('profiles')))->orderBy('created_at','desc')->get());



    }

    public function store(Request $request){
        $post = new Post();
        $post->content = $request->get('content');
        $post->user_id = auth()->user()->profile->id;
        $post->save();

        return new PostResource($post) ;



    }
}
