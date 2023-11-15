<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-register-basic', ['pageConfigs' => $pageConfigs]);
  }
  public function register(Request $request)
  {
    // Validation des données du formulaire (à adapter en fonction de vos besoins)
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => [
        'required',
        'email',
        'max:255',
        Rule::unique('users'), // Vérifie si l'email est unique dans la table 'users'
      ],
      'password' => 'required|string|min:8',
      'terms' => 'accepted',
    ], [
      'email.unique' => 'Cet e-mail est déjà utilisé. Veuillez en choisir un autre.',
    ]);

    // Création d'un nouvel utilisateur
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    // Vous pouvez également authentifier l'utilisateur ici si votre application le nécessite

    // Redirection après l'inscription réussie
    return redirect()->route('auth-login-basic')->with('success', 'Inscription réussie!');
  }
}