<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }

  public function Login(Request $request)
  {

    $email = $request->email;
    $password = $request->password;


    if (Auth::attempt(['email' => $email, 'password' => $password], $request->get('remember'))) {
      //connecter
      $request->session()->regenerate();
      return to_route('pages-home');
    } else {
      return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect.'
      ])->withInput($request->only('email', 'remember'));
    }
  }
}