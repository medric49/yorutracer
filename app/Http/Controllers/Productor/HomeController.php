<?php

namespace App\Http\Controllers\Productor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index() {
        $transformations = \auth()->user()->productor->transformations()->where('type','!=','INITIAL')->orderBy('title','desc')->take(4)->get();
        return view('productor.home',compact('transformations'));
    }

    public function disconnect(Request $request) {
        Auth::logout();
        return redirect()->route('guest.login');
    }
}
