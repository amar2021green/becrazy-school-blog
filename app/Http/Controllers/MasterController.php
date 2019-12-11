<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

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
    public function addTodolists(Request $request){

      if($request->filled('title')){
        $title = $request->input('title');
        //リクエストされたtitleデータを取得して$titleに代入(表示ではない)
      }
      if($request->filled('memo')){
        $memo = $request->input('memo');
        //リクエストされたmemoデータを取得して$memoに代入(表示ではない)
      }

      if($request->filled('completed_at')){
        $completed_at = $request->input('completed_at');
        //リクエストされたcompleted_atデータを取得して$completed_atに代入(表示ではない)
      }

      $新規データ = new TodoList();
      //新しいデータを登録する宣言みたいなもの
      //new TodoList();でtodolistsテーブルの１レコード(id,title...)が作成されるイメージ

      $新規データ->title = $title;
      $新規データ->memo = $memo;
      $新規データ->save();
      //フォームから入力されたデータ(title,memo)が1つのレコードとして新規データに追加(save)された
      return redirect('/todolists');
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
