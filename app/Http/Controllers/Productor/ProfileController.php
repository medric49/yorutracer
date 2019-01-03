<?php

namespace App\Http\Controllers\Productor;

use App\Http\Requests\Productor\PasswordStorageRequest;
use App\Http\Requests\Productor\SocialInformationStorageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('productor.profile');
    }

    public function modificationForm() {
        return view('productor.profile_modification_form');
    }

    public function storeSocialInformation(SocialInformationStorageRequest $request) {
        auth()->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website')
        ]);

        return redirect()->route('productor.profile');
    }

    public function storePassword(PasswordStorageRequest $request) {
        if (Hash::check($request->input('password'),auth()->user()->password)) {
            auth()->user()->update(
                [
                    'password' => Hash::make($request->input('new_password'))
                ]
            );
            return redirect()->route('productor.profile');
        }
        return redirect()->route('productor.profile_modification_form')->withErrors(['password' => 'Mot de passe incorrect.']);
    }
}

