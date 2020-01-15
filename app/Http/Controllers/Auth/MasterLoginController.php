<?php
namespace App\Http\Controllers\Auth;

class MasterLoginController extends LoginController
{

  public function showLoginForm(){
    return view('user.login');
  }

  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/master/bloglist';


}
