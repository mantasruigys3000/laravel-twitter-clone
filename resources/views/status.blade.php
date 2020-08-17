
@extends('layouts.layout')

@section('isAuth')
{{auth()->check() }}
@endsection

@section('profile')
{{auth()->user()->profile}}
@endsection

@section('contentbody')
{{$postid}}
ahh
@endsection

