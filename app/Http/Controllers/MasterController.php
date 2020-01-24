<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller {


    //コンストラクタ内に$this->middleware('auth')と書くことで、
    //MasterController内のその他のメソッドを実行する前に、
    //ログイン済みかどうかをチェックしてくれます。
    public function __construct() {
       $this->middleware('auth');
    }

    public function bloglist(){
      //全ての記事取得
      $all = Post::all();
      return view('post.BlogList',array('all' => $all));
    }

//記事投稿フォーム
    public function showAddblog(){
      return view('post.formblog');
    }
        /**
        * Post登録処理
        * @param Request $request Postリクエスト
        */
        public function post(Request $request){
            if($request->filled('title')){
          $request->title;
          //リクエストされたtitleデータを取得して$titleに代入(表示ではない)
        }
          if($request->filled('content')){
            $request->content;
          //リクエストされたcontentデータを取得して$contentに代入(表示ではない)
          }

          if($request->filled('status')){
            $request->status;
          //リクエストされたcontentデータを取得して$contentに代入(表示ではない)
          }

        $新規blog = new Post();
        //新しいデータを登録する宣言みたいなもの
        //new Post();でpostsテーブルの１レコード(id,title...)が作成されるイメージ

        $新規blog->user_id = 1;
        //postでサーバに送る際にuser_idに１を指定してリクエストしている
        //※今回の登録時にはuser_idの指定は必須

        $新規blog->title = $request->title;
        $新規blog->content = $request->content;
        $新規blog->status = $request->status;
        $新規blog->slug = $request->slug;
        //上記は'新規blog'の'title','content'等のインスタンスに
        //リクエスト時に入力されたtitle,content等のvalueを代入した

        $新規blog->type = 'article';
        $新規blog->mime_type = 'text/html';
        //上記は'新規blog'の'type','mime_type'インスタンスに指定のvalueを入れている
        //※mime_typeに入れた値は、htmlを指定している

        $新規blog->save();
        //フォームから入力されたデータ(title,content)等が
        //1つのレコードとして新規データに追加(save)された
            return redirect('/master/bloglist');
          }//リダイレクトでURLパスを直接指定


//TagCategoryフォーム
          public function showAddTag(){
            return view('post.tagForm');
          }
              /**
              * Post登録処理
              * @param Request $request Postリクエスト
              */
              public function postTag(Request $request){
              if($request->filled('type')){
              $request->type;
              }//リクエストされたtypeデータを取得してform typeに入る(表示ではない)


                  if($request->filled('name')){
                $request->name;
                //リクエストされたnameデータを取得してform nameに入る(表示ではない)
              }

              $新規tag = new Taxonomy();
              //新しいデータを登録する宣言みたいなもの
              //new Taxonomy();でtaxonomyテーブルの１レコード(id,name...)が作成されるイメージ


              $新規tag->type = $request->type;
              $新規tag->name = $request->name;
              $新規tag->slug = $request->slug;
              //上記は'$新規tag'の'type','name','slug'のインスタンスに
              //リクエスト時に入力されたname,slugのvalueを代入した


              $新規tag->save();
              //フォームから入力されたデータ(title,content)等が
              //1つのレコードとして新規データに追加(save)された
                  return redirect('/master/bloglist');
                }//リダイレクトでURLパスを直接指定




//編集フォームをviewする
    public function editcontent($id){
      $edit = Post::find($id);
      return view('post.editblog',['編集blog' => $edit]);
    }
    //リクエストされたeditidから対象レコードを取得して、$editに代入
    //リターンviewでpost配下のeditblogファイルを表示させる



//編集フォームで入力したものをデータ更新する
    public function updatecontent(Request $request){
      $request->validate([
        'id' => 'required',
        'title' => 'required',
        'content' => 'required',
        'status' => 'required'
      ]);//フォームの入力チェック

      $編集blog = Post::find($request->id);
      $編集blog->title = $request->title;
      $編集blog->content = $request->content;
      $編集blog->status = $request->status;
      $編集blog->save();
      return redirect('/master/bloglist');
    }
//更新動作は$編集blogにリクエストされたidをもとにレコードインスタンスを代入
//$編集blog->title = $request->titleでblogリストで、
//編集したい記事のidとリクエストしたtitleが紐付けられる

//$編集blog->save();で更新した編集blogがsaveされる（更新）
//その後リターンでblogリストにリダイレクトする



public function deletecontents(Request $request){
  // バリデーション
  $validatedData = $request->validate([
    'id' => 'required'
  ]);

  $編集blog = Post::find($request->id);
  $編集blog->delete();
  return redirect('/master/bloglist');
}



}
