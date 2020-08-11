<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
<userprofile usr="{{$username}}" auth_usr="{{auth()->user()}}"></userprofile>
@endsection('content')

