@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <user-navbar isAuth="{{auth()->check()}}" profile="{{auth()->user()->profile}}">
    </user-navbar>

    <div id="">

        <post-input class="mx-auto w-40" ></post-input>
        <postfeed type="dashboard" auth_user="{{auth()->user()}}" profilearr="{{auth()->user()->profile->follows}}"> </postfeed>
    </div>
@endsection
