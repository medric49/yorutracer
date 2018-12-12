<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Managers\FileManager;
use App\Model\Distributor;
use App\Model\Productor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function productor() {
        return view('guest.register_form',['type'=> 'PRODUCTOR']);
    }

    public function distributor() {
        return view('guest.register_form',['type'=> 'DISTRIBUTOR']);
    }

    public function index(){
        return view('guest.register');
    }

    public function store(RegisterRequest $request) {
        $logo = FileManager::storeImage($request->logo,config("yorutracer.user_logo_folder"));


        $user = User::create([
            'name' => $request->input('name'),
            'email' =>$request->input('email'),
            'logo' => $logo,
            'tel' => $request->input('tel'),
            'website' => $request->input('website'),
            'type' => $request->input('type'),
            'longitude' => $request->input('lon'),
            'latitude' => $request->input('lat'),
            'password' => Hash::make($request->input('password'))
        ]);

        if ($request->input('type') == 'PRODUCTOR') {
            Productor::create([
                'user_id' => $user->id
            ]);
        }
        elseif ($request->input('type') == 'DISTRIBUTOR') {
            Distributor::create([
                'user_id' => $user->id
            ]);
        }
        Auth::login($user,true);
        return redirect()->route('welcome');
    }
}
