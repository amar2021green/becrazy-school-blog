<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;

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

    public function AllTag(){
      $AllTags = Taxonomy::where('type','tag')->get();
      return view('post.AllTags',array('AllTags' => $AllTags));
    }


    public function ShowTagPost($slug){
      $TagPost = Taxonomy::where([
        ['type','tag'],
        ['slug',$slug]])->first();
      return view('post.TagPosts',array('TagPost' => $TagPost->posts));
    }

    public function AllCategory(){
      $AllCategories = Taxonomy::where('type','category')->get();
      return view('post.AllCategories',array('AllCategories' => $AllCategories));
    }

    public function ShowCategoryPost($slug){
      $CategoryPost = Taxonomy::where([
        ['type','category'],
        ['slug',$slug]])->first();
        return view('post.CategoryPosts',array('CategoryPost' => $CategoryPost->posts));
    }

//記事投稿フォーム
    public function showAddblog(){
      $allType = Taxonomy::all();
      //$allTypeにはTaxonomyの全てが入っているからreturnされる、
      //post.formblogのフォームの中では$allTypeとして上手く使用する
      return view('post.formblog',array('allType' => $allType));
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



        //⭐$新規blog->save();でpostのid1つ(記事)を生成したあとに
        //アタッチをしてpost_idとtaxonomy_idを紐付ける
        $新規blog->taxonomy()->attach([$request->tag,$request->category]);
        //$新規blog(記事)をtaxonomyテーブルのidと紐付ける、
        //attachの中で実行されているのはフォームで定義されているリクエストtag,category

            return redirect('/master/bloglist');
          }//リダイレクトでURLパスを直接指定


//TagCategoryフォーム
          public function ShowAddTaxonomy(){
            return view('post.TaxonomyForm');
          }
              /**
              * Post登録処理
              * @param Request $request Postリクエスト
              */
              public function AddTaxonomy(Request $request){
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




//記事編集フォームをviewする
    public function editcontent($id){
      $edit = Post::find($id);
      $taxonomy = Taxonomy::all();
      return view('post.editblog',array('編集blog' => $edit,'taxonomy' => $taxonomy));
    }
    //リクエストされたeditidから対象レコードを取得して、$editに代入
    //リターンviewでpost配下のeditblogファイルを表示させる



//記事編集フォームで入力したものをデータ更新する
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
      $編集blog->taxonomy()->detach();
      if(!empty($request->tag) && !empty($request->category)) {
        $編集blog->taxonomy()->attach([$request->tag,$request->category]);
      }
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
  $編集blog = Post::find($request->id)->delete();
  return redirect('/master/bloglist');
}

  //Categoryとタグ編集フォームのview
    public function EditTaxonomy($id){
      $Edit = Taxonomy::find($id);
      return view('post.EditTaxonomy',['編集taxonomy' => $Edit]);
    }
    //リクエストされたeditidから対象レコードを取得して、$editに代入
    //リターンviewでpost配下のeditblogファイルを表示させる

    //Categoryとタグ編集フォームのpost
    public function UpdateTaxonomy(Request $request){
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'slug' => 'required'
      ]);//フォームの入力チェック

      $編集taxonomy = Taxonomy::find($request->id);
      $編集taxonomy->name = $request->name;
      $編集taxonomy->slug = $request->slug;
      $編集taxonomy->save();
      return redirect('/master/bloglist');
    }
    //更新動作は$編集taxonomyにリクエストされたidをもとにレコードインスタンスを代入
    //$編集taxonomy->name = $request->name でTaxonomyリスト(Category,Tag)
    //編集したいtaxonomyのidとリクエストしたnameが紐付けられる

    //$編集taxonomy->save();で更新した編集taxonomyがsaveされる（更新）
    //その後リターンでblogリストにリダイレクトする

    public function DeleteTaxonomy(Request $request){
    // バリデーション
    $validatedData = $request->validate([
      'id' => 'required'
    ]);
    $編集taxonomy = Taxonomy::find($request->id);
    $編集taxonomy->posts()->detach();
    $編集taxonomy->delete();
    return redirect('/master/bloglist');
    }

    public function showChangePasswordForm() {
        return view('post.changepassword');
    }
    public function changePassword(Request $request) {
        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは6文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');
    }


}
