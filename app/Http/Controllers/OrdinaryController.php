<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class OrdinaryController extends Controller {

   function loggedOut(Request $request)
  {
    $all = Post::all();
      return view('ordinary.list',array('all' => $all));
  }

}
