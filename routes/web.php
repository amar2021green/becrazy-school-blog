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
  return view('top');
});




//URLがmaster/〜 のグルーピング。
//masterは管理画面になるためログイン,一般ユーザー向けのフロント画面は別のURLとコントローラを使うこと
Route::prefix('master')->group(function () {

  //記事管理（投稿、更新）
  Route::get('/bloglist', 'MasterController@bloglist');//BLOG一覧

  Route::get('addPost', 'MasterController@ShowAddPost');//BLOG投稿
  Route::post('addPost', 'MasterController@AddPost');//BLOG投稿

  Route::get('updatePost', 'MasterController@ShowUpdatePost');//BLOG更新
  Route::post('updatePost', 'MasterController@UpdatePost');//BLOG更新

});
