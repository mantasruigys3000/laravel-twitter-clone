<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $people = UserResource::collection( User::where('username','like','%'.$request->get('search').'%')->get());
        $posts = PostResource::collection( Post::where('content','like','%'.$request->get('search').'%')->get());

        return ['people' => $people, 'posts' => $posts];

    }

}
