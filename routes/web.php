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


Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//users
Route::get('/users/getuser/{username}','ProfileController@show');
Route::post('/users/editbio','ProfileController@edit');
Route::post('/users/profiles','UserController@index');

//follows
Route::post('/users/isfollowing','ProfileController@isFollowing');
Route::post('/users/startfollowing','FollowController@store');
Route::post('/users/stopfollowing','FollowController@destroy');

//likes

Route::post('/posts/like/{postid}','LikeController@store');

//notifications

Route::post('/notification/create','NotificationController@store');
Route::get('/notifications','NotificationController@show');


Route::get('/','SpaController@index');




//posts
Route::post('/post','PostsController@store');
Route::post('/posts','PostsController@index');
Route::get('/post/{postid}','PostsController@show');
Route::get('/status/{postid}',function($postid){
    return view('status',['postid' =>$postid]);
});

Route::get('/profile/{username}',function ($username){
    return view('profile',['username' => $username]);
});

Route::get('/uploadImg',function (){
    return view('upload_image');

});

Route::post('/i/uploadImg','FileController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

