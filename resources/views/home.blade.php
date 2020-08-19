@extends('layouts.app')

@section('content')
    <user-navbar isAuth="{{auth()->check()}}" profile="{{auth()->user()->profile}}">
    </user-navbar>

    <div id="">

        <post-input class="mx-auto w-40" ></post-input>
        <postfeed type="dashboard" auth_user="{{auth()->user()}}" profilearr="{{auth()->user()->follows}}"> </postfeed>
    </div>
@endsection
