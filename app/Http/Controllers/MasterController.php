<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller {

    public function bloglist(){
      //全ての記事取得
      $all = Post::all();
      return view('post.BlogList',array('all' => $all));
    }


    /**
    * Post登録処理
    * @param Request $request Postリクエスト
    */
    public function ShowPost(Request $request){


        if($request->filled('title')){
          $request->title;
          //リクエストされたtitleデータを取得して$titleに代入(表示ではない)
        }
          if($request->filled('content')){
            $request->content;
          //リクエストされたcontentデータを取得して$contentに代入(表示ではない)
          }





      $新規blog = new Post();
      //新しいデータを登録する宣言みたいなもの
      //new Post();でpostsテーブルの１レコード(id,title...)が作成されるイメージ

      $新規blog->user_id = 1;
      //postでサーバに送る際にuser_idに１を指定してリクエストしている
      //※今回の登録時にはuser_idは必須

      $新規blog->title = $request->title;
      $新規blog->content = $request->content;
      $新規blog->status = $request->status;
      $新規blog->slug = $request->slug;
      //上記は'新規blog'の'title','content'等のインスタンスに
      //リクエスト時に入力されたtitle,content等のvalueが代入される


      $新規blog->type = 'article';
      $新規blog->mime_type = 'text/html';
      //上記は'新規blog'の'type','mime_type'インスタンスに指定のvalueを入れている
      //※mime_typeに入れた値は記事なのでhtmlを指定している
      
      $新規blog->save();
      //フォームから入力されたデータ(title,content)等が
      //1つのレコードとして新規データに追加(save)された
      return redirect('/master/bloglist');
      }



    public function editdone(Request $request){

      $request->validate([
        'id' => 'required'
      ]);
    //完了の実行なのでリクエストするのはidだけでいい。

      //now()とはカーボンクラスから内部的に関数を実行している(カーボンクラスはuseしていない)
      $post = TodoList::find($request->id);
      $post->completed_at = now();
      $post->save();
      return redirect('/doneTodolists');
    }

    public function doneshow(Request $request){
      $done = TodoList::whereNotNull('completed_at')->get();
      return view('post.doneTodolists',array('done' => $done));

    }

    public function delete(Request $request){
      // バリデーション
      $validatedData = $request->validate([
        'id' => 'required'
      ]);

      TodoList::destroy($request->id);
      return redirect('todolists');
    }



//編集フォームをviewする
    public function editshow(Request $request){
      $edittodo = TodoList::find($request->editid);
      return view('post.editTodolists',['todo' => $edittodo]);
    }
    //リクエストされたeditidから対象レコードを取得して、$edittodoに代入
    //リターンviewでポスト配下のeditTodolistsファイルを表示させる



//編集フォームで入力したものをデータ更新する
    public function update(Request $request){
      $request->validate([
        'id' => 'required',
        'title' => 'required',
        'memo' => 'required'
      ]);


      $todo = TodoList::find($request->id);
      $todo->title = $request->title;
      $todo->memo = $request->memo;
      $todo->save();
      return redirect('/todolists');
    }
//更新動作は$todoにリクエストされたidをもとにレコードインスタンスを代入
//$todo->title = $request->titleで未完了リストで編集したいidをリクエストしたtitleが入る
//$todo->save();で更新したtodoがsaveされる（更新）
//その後リターンで未完了リストにリダイレクトする

}
