<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    //ソフトデリートを使う宣言；2020/01/07

      public function posts(){
        return $this->belongsToMany('App\Post');
      }

}
