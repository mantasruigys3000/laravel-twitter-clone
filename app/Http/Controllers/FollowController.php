<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $follow = new Follow();

        $follow->profile_id = auth()->user()->profile->id;
        $follow->follow_id = $request->get('following')['id'];
        $follow->save();

        return  response()->json($follow);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        //$follow = auth()->user()->profile->follows()->where('follow_id',$request->get('following')['id'])->first();
        $follow = Follow::where(['profile_id' => auth()->user()->profile->id ,'follow_id' => $request->get('following')['id']])->FirstOrFail();

        //dd($follow);

        $follow->delete();
        return($follow);

    }
}
