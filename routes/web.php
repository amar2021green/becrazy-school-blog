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


//URLがmaster/〜 のグルーピング。
//masterは管理画面になるためログイン,一般ユーザー向けのフロント画面は別のURLとコントローラを使うこと
Route::prefix('master')->group(function () {

  //Login実装
  Route::get('/login', 'Auth\MasterLoginController@showLoginForm');
  Route::post('/login', 'Auth\MasterLoginController@login');
  Route::post('/logout', 'Auth\MasterLoginController@logout');


  //user登録
  Route::get('/register', 'Auth\MasterRegisterController@showRegistrationForm');
  Route::post('/register', 'Auth\MasterRegisterController@register');


  //記事一覧ページ
  Route::get('/bloglist', 'MasterController@bloglist');//BLOG一覧表示

  //BLOG投稿フォームの表示
  Route::get('addblog','MasterController@showAddblog');
  //BLOG投稿postリクエスト
  //この場合のaddblogはdataの送り先
  Route::post('addblog', 'MasterController@post');

  Route::get('addTag','MasterController@showAddTag');
  //TagとCategory投稿postリクエスト
  //この場合のaddTagはdataの送り先
  Route::post('addTag', 'MasterController@postTag');

  Route::get('/AllTags','MasterController@AllTag');
  //複数Tagを見せるview
  Route::get('/AllTags/{slug}','MasterController@ShowTagPost');
  //Tagに紐づく記事一覧を見せるview

  Route::get('/AllCategories','MasterController@AllCategory');
  //複数Categoryを見せるview
  Route::get('/AllCategories/{slug}','MasterController@ShowCategoryPost');
  //Categoryに紐づく記事一覧を見せるview



  Route::get('/Tags/{slug}','MasterController@ShowTag');
  //単体Tagを見せるview

  Route::get('update{id}', 'MasterController@editcontent');//BLOG更新
  Route::post('update', 'MasterController@updatecontent');//BLOG更新
  Route::post('delete', 'MasterController@deletecontents');//BLOG削除
});




  Route::get('/ordinary/list', 'OrdinaryController@loggedOut');
  //このloggedOutメソッドはlogoutメソッド(ログアウト処理)が実行されたあとに実行される

  Route::get('/ordinary/{slug}','OrdinaryController@TagPost');
  //Tagに紐づく記事一覧から各記事を見せるview

  Route::get('/ordinary/list/{slug}','OrdinaryController@ShowContents');
  //タイトル→コンテンツで入ったときの記事のコンテンツview






  Route::get('/ordinary/category/{slug}','OrdinaryController@ShowCategory');
  //Categoryを見せるview
