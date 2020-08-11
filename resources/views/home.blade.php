@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <user-navbar></user-navbar>

    <div id="">
        <post-input></post-input>
        <postfeed type="dashboard" profilearr="{{auth()->user()->profile->follows}}"> </postfeed>
    </div>
@endsection
