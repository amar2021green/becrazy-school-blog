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
//masterは管理画面になるためログインや一般ユーザー向けのフロント画面は別のURLとコントローラを使うこと
Route::prefix('master')->group(function () {

  //
  //Route::get('users', 'MasterController@users');
  //Route::get('addUser', 'MasterController@showAddUser');
  //Route::post('addUser', 'MasterController@addUser');

  //記事管理（投稿、削除、更新）
  Route::get('blogList', 'MasterController@blogList');
  Route::get('addPost', 'MasterController@showAddPost');
  Route::post('addPost', 'MasterController@addPost');
  Route::get('updatePost', 'MasterController@showUpdatePost');
  Route::post('updatePost', 'MasterController@updatePost');

})
