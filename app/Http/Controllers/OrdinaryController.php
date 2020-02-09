<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post,Taxonomy};
use Illuminate\Support\Facades\Auth;


class OrdinaryController extends Controller {

   function loggedOut(Request $request)
  {
    $all = Post::all();
      return view('ordinary.list',array('all' => $all));
  }


  public function ShowContents($slug)
  {
    $kizi1 = Post::where('slug',$slug)->first();
    //$kizi1にはPostモデルのインスタンスが入る
		return view('ordinary.japan',array('kizi1' => $kizi1));
	}

  public function TagPost($slug){
    $TagPost = Post::where('slug',$slug)->first();
      return view('ordinary.tokyo',array('TagPost' => $TagPost));
  }

  public function ShowCategory($slug)
  {//typeがcategoryでなおかつslugにあてはまるwhere文を入れる
    $category1 = Taxonomy::where([
      ['type','category'],
      ['slug',$slug]])->first();
    //$category1にはTaxonomyモデルのインスタンスが入る
		return view('ordinary.categories',array('category1' => $category1));
	}

  public function AllCategory(){
    $AllCategories = Taxonomy::where('type','category')->get();
    return view('ordinary.categories',array('AllCategories' => $AllCategories));
  }

  public function AllTag(){
    $AllTags = Taxonomy::where('type','tag')->get();
    return view('ordinary.tags',array('AllTags' => $AllTags));
  }



}
