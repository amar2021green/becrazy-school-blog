<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{

    protected $table = 'taxonomy';

    public function posts(){
      return $this->belongsToMany('App\Models\Post','taxonomy_relationships');
    }//紐づかせたいテーブルを第１引数に指定。'App\Models\Post'
    //(taxonomyテーブルなのでpostテーブルを紐付かせたい)

     //return $this->belongsToMany('App\Models\Post')としてしまうと
     //Eloquentが中間テーブルをtaxonomy_postと認識してしまうので
     //第２引数は今回の中間テーブルを指定している。(今回であればtaxonomy_relationships)

}
