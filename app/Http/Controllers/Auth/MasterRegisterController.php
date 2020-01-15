<?php
namespace App\Http\Controllers\Auth;

class MasterRegisterController extends RegisterController
{

  public function __construct() {
     $this->middleware('auth');
  }

  public function showRegistrationForm(){
    return view('user.register');
  }
  //registerできるユーザーはログイン済みのユーザーでなければできない仕様なのでregisterフォームに行く前にログイン済みかチェックしてくれるconstructを仕込んだ

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/master/bloglist';
}
