<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function index(){
        //return  response()->json(Post::all());
        return PostResource::collection(Post::orderBy('created_at','desc')->get());



    }

    public function store(Request $request){
        $post = new Post();
        $post->content = $request->get('content');
        $post->user_id = auth()->user()->id;
        $post->save();

        return new PostResource($post) ;



    }
}
