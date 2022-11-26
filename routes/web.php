<?php

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

 Route::get('/', function () {
     return view('welcome');
 });
 //Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');


Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');
Route::post('/profile/{id}/update','UsersController@update');




Route::get('/follow-list','FollowsController@followlist');
Route::get('/follower-list','FollowsController@followerlist');

Route::get('/logout','Auth\LoginController@logout');

Route::post('/create','PostsController@create');
Route::get('post/{id}/delete','PostsController@delete'); 
//Route::get('post/{id}/updateForm','PostsController@updateForm');
Route::post('post/{id}/update','PostsController@update');
Route::get('/search','UsersController@search');

Route::post('users/{id}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

Route::get('/userprofile/{id}','UsersController@userprofile');


Route::get('/login/{follow}','UsersController@followcount');
Route::get('/login/{followercount}','UsersController@follower');

