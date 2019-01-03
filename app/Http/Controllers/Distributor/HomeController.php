<?php

namespace App\Http\Controllers\Distributor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        return view('distributor.home');
    }

    public function disconnect(Request $request) {
        Auth::logout();
        return redirect()->route('guest.login');
    }
}
