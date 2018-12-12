<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('guest.login');
    }

    public function connect(LoginRequest $request) {

        $user = User::where('email',$request->input('email'))->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                \auth()->login($user,true);
                return redirect()->route('welcome');
            }
            return redirect()->route('guest.login')->withErrors(['password' => 'mot de passe incorrect']);
        }
        return redirect()->route('guest.login')->withErrors(['email' => 'L\'email est inconnu']);
    }
}
