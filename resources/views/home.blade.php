@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <user-navbar isAuth="{{auth()->check()}}"></user-navbar>

    <div id="">
        <profilesearch></profilesearch>
        <post-input></post-input>
        <postfeed type="dashboard" auth_user="{{auth()->user()}}" profilearr="{{auth()->user()->profile->follows}}"> </postfeed>
    </div>
@endsection
