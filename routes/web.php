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

  Route::get('AddTaxonomy','MasterController@ShowAddTaxonomy');
  //TagとCategory投稿postリクエスト
  //この場合のAddTaxonomyはdataの送り先
  Route::post('AddTaxonomy','MasterController@AddTaxonomy');
  //TagとCategory投稿post', 'MasterController@postTag');

  Route::get('/AllTags','MasterController@AllTag');
  //複数Tagを見せるview
  Route::get('/AllTags/{slug}','MasterController@ShowTagPost');
  //Tagに紐づく記事一覧を見せるview

  Route::get('/AllCategories','MasterController@AllCategory');
  //複数Categoryを見せるview
  Route::get('/AllCategories/{slug}','MasterController@ShowCategoryPost');
  //Categoryに紐づく記事一覧を見せるview


  Route::get('update{id}', 'MasterController@editcontent');//BLOG記事更新
  Route::post('update', 'MasterController@updatecontent');//BLOG記事更新
  Route::post('delete', 'MasterController@deletecontents');//BLOG記事削除


  Route::get('/taxonomy/update{id}', 'MasterController@EditTaxonomy');
  //CategoryまたはTagの更新
  Route::post('/taxonomy/update', 'MasterController@UpdateTaxonomy');
  //CategoryまたはTagの更新
  Route::post('/taxonomy/delete', 'MasterController@DeleteTaxonomy');
  //CategoryまたはTagの削除

  Route::get('changepassword', 'MasterController@showChangePasswordForm');
  Route::post('changepassword', 'MasterController@changePassword')->name('changepassword');
});




  Route::get('/ordinary/list', 'OrdinaryController@List');
  //一般Viewの記事一覧画面
  Route::get('/ordinary/list/{slug}','OrdinaryController@ShowContents');
  //タイトル→コンテンツの記事view

  Route::get('/ordinary/category','OrdinaryController@AllCategory');
  //AllCategoryのみを見せるview
  Route::get('/ordinary/category/{slug}','OrdinaryController@CategoryPosts');
  //各categoryに紐づく記事一覧を見せるview

  Route::get('/ordinary/tag','OrdinaryController@AllTag');
  //AllTagのみを見せるview
  Route::get('/ordinary/tag/{slug}','OrdinaryController@TagPost');
  //各Tagに紐づく記事一覧を見せるview
