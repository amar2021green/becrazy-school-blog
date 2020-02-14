<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public function taxonomy(){
      return $this->belongsToMany('App\Models\Taxonomy','taxonomy_relationships');
    }//紐づかせたいテーブルを第１引数に指定。'App\Models\Taxonomy'
    //(postテーブルなのでtaxonomyテーブルを紐付かせたい)

     //return $this->belongsToMany('App\Models\Taxonomy')としてしまうと
     //Eloquentが中間テーブルをtaxonomy_postと認識してしまうので
     //第２引数は今回の中間テーブルを指定している。(今回であればtaxonomy_relationships)

use SoftDeletes;


}



//$post = App\Models\Post::find(1);
//foreach ($post->taxonomy as $taxonomy){}
  //２３行目の時点ではpostsテーブルのid=1を指定している
  //$post->taxonomyとすることで
  //taxonomy_relationshipsテーブルのpost_id=1に紐づく
  //taxonomyテーブルの1コレクションがとれる(正確には配列データとして取得)
  //taxonomy_idと紐づくpost_id＝１のものは複数あるのでforeachでループする
