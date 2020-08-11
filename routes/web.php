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

//users
Route::get('/users/getuser/{username}','ProfileController@show');
Route::post('/users/editbio','ProfileController@edit');

Route::post('/users/isfollowing','ProfileController@isFollowing');



Route::get('/', 'HomeController@index')->name('home');

Route::post('/post','PostsController@store');
Route::post('/posts','PostsController@index');

Route::get('/profile/{username}',function ($username){
    return view('profile',['username' => $username]);
});

Route::get('/uploadImg',function (){
    return view('upload_image');

});

Route::post('/i/uploadImg','FileController@store');

