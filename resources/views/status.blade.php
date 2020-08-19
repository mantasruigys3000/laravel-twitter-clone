
@extends('layouts.layout')

@section('isAuth')
{{auth()->check() }}
@endsection

@section('profile')
{{auth()->user()}}
@endsection

@section('contentbody')
{{$postid}}

@endsection

