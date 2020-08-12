<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Profile;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //dd(Profile::where('username','like','%'.$request->get('search').'%')->get());
        return ProfileResource::collection(Profile::where('username','like','%'.$request->get('search').'%')->get());

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @param \App\Profile $profile
     * @return ProfileResource
     */
    public function show($username, Profile $profile)
    {


        $prof = Profile::where('username', $username)->FirstOrFail();
        return new ProfileResource($prof);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        //

        $prof = auth()->user()->profile;
        $prof->bio = $request->get('bio');
        $prof->profile_picture = $request->get('pic');
        $prof->save();


        return auth()->user()->profile;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function isFollowing(Request $request)
    {
        $prof = $request->get('following');
        //dd();
        //dd(auth()->user()->profile->follows->where('follow_id',$prof['id']));
        //return (auth()->user()->profile->follows->where('follow_id',$prof['id'])->exists());
        return response()->json((auth()->user()->profile->follows->contains($prof['id'])));

    }
}
