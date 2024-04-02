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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// 追記
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
// kernelにあるrouteMiddlewareのauthを利用
// コントローラーとメソッドを変更
Route::get('/top', 'PostsController@index')->middleware('auth');
Route::get('/profile', 'UsersController@profile')->middleware('auth');
// Route::get('/edit', 'UsersController@search')->middleware('auth');
Route::get('/search', 'UsersController@search')->middleware('auth');
Route::get('/followList', 'FollowsController@followList')->middleware('auth');
Route::get('/followerList', 'FollowsController@followerList')->middleware('auth');


// 投稿作成
Route::post('/post', 'PostsController@postCreate')->middleware('auth');

// // 投稿更新用
Route::post('/post/{id}/postUpdate', 'PostsController@postUpdate')->middleware('auth');

// delete用
Route::get('/post/{id}/delete', 'PostsController@delete')->middleware('auth');

// 検索用
Route::post('/search', 'UsersController@userSearch')->middleware('auth');

// フォロー機能
Route::post('/post/{user}/search','UsersController@follow')->middleware('auth')->name('attach');

// フォロー解除機能
Route::post('/post/{user}search','UsersController@unfollow')->middleware('auth')->name('detach');





// アイコン先のプロフィール画面
Route::get('/profile/{id}/otherProfile', 'UsersController@profile')->middleware('auth');

// フォロー機能
Route::post('/profile/{user}/otherProfile', 'UsersController@follow')->middleware('auth')->name('attach');

// フォロー解除機能
Route::post('/profile/{user}/otherProfile', 'UsersController@unfollow')->middleware('auth')->name('detach');
