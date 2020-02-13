<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post,Taxonomy};
use Illuminate\Support\Facades\Auth;


class OrdinaryController extends Controller {

   function List(Request $request)
  {
    $all = Post::all();
      return view('ordinary.List',array('all' => $all));
  }


  public function ShowContents($slug)
  {
    $kizi1 = Post::where('slug',$slug)->first();
    //$kizi1にはPostモデルのインスタンスが入る
		return view('ordinary.japan',array('kizi1' => $kizi1));
	}


  public function AllCategory(){
    $AllCategories = Taxonomy::where('type','category')->get();
    return view('ordinary.Categories',array('AllCategories' => $AllCategories));
  }

  public function CategoryPosts($slug)
  {//typeがcategoryでなおかつslugにあてはまるwhere文を入れる
    $category1 = Taxonomy::where([
      ['type','category'],
      ['slug',$slug]])->first();
    //$category1にはTaxonomyモデルのインスタンスが入る
		return view('ordinary.CategoryPosts',
    array('posts'=>$category1->posts,'category1' => $category1));
	}

  public function AllTag(){
    $AllTags = Taxonomy::where('type','tag')->get();
    return view('ordinary.Tags',array('AllTags' => $AllTags));
  }

  public function TagPost($slug){
    $Tag_Posts = Taxonomy::where([
      ['type','tag'],
      ['slug',$slug]])->first();
      return view('ordinary.TagPosts',
      array('posts' => $Tag_Posts->posts,'TagPosts'=>$Tag_Posts));
      //posts は bladeの変数名($posts)▶タグに紐づく記事一覧
      //TagPosts は bladeの変数名($TagPosts)▶Taxonomyのtagレコード
  }



}
