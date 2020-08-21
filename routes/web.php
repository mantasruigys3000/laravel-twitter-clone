<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//users
Route::get('/users/getuser/{user}','UserController@show');
Route::get('/users/getAuthUser','UserController@authUser');
Route::post('/users/editbio','UserController@update');
Route::post('/users/profiles','UserController@index');

//search

Route::post('/searchAll','SearchController@index');

//follows
Route::get('/users/isFollowing/{user}','UserController@isFollowing');
Route::post('/users/startfollowing','FollowController@store');
Route::post('/users/stopfollowing','FollowController@destroy');

Route::post('/users/follow/{user}','UserController@toggleFollow');

//likes

Route::post('/posts/like/{postid}','UserController@toggleLike');

//notifications

Route::post('/notification/create','NotificationController@store');
Route::get('/notifications','NotificationController@show');



Route::group(['middleware' =>  'auth'],function(){
    Route::get('/','SpaController@index');
});


//posts
Route::get('/posts/{user}','UserController@getPosts');


Route::get('/posts','UserController@getFollowingPosts');
Route::post('/post','PostsController@store');
Route::get('/post/{postid}','PostsController@show');
Route::get('/status/{postid}',function($postid){
    return view('status',['postid' =>$postid]);
});

/*
Route::get('/profile/{username}',function ($username){
    return view('profile',['username' => $username]);
});
*/


Route::get('/uploadImg',function (){
    return view('upload_image');

});

Route::post('/i/uploadImg','FileController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

