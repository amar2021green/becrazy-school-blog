<?php
namespace App\Http\Controllers\Auth;

class MasterRegisterController extends RegisterController
{

  public function showRegistrationForm(){
    return view('user.register');
  }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/master/bloglist';
}
