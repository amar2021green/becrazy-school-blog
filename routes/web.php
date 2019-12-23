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
  Route::get('/bloglist', 'MasterController@bloglist');//BLOG一覧表示

  Route::get('addblog',function () {
    return view('post.formblog');
});//BLOG投稿フォームの表示
  Route::post('addblog', 'MasterController@ShowPost');
  //BLOG投稿postリクエスト
  //この場合のaddblogはdataの送り先

  Route::get('updatepost', 'MasterController@ShowUpdatePost');//BLOG更新
  Route::post('updatepost', 'MasterController@UpdatePost');//BLOG更新

});
