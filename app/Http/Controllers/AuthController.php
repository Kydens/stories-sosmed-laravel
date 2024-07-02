<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function signup()
    {
        return view('auth.signup');
    }

    function signupPost(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'username'=>'required|string|max:255|unique:users',
            'email'=>'required|string|max:255|unique:users',
            'name'=>'required|string|max:255',
            'password'=>'required',
            'password_confirm'=>'required|same:password',
        ],[
            'username.unique'=>'Username telah tersedia.',
            'email.unique'=>'Email telah tersedia.',
            'password_confirm.same'=>'Password tidak sama!',
        ]);

        // dd($validateData);

        $user = User::create([
            'username'=>$validateData['username'],
            'name'=>$validateData['name'],
            'email'=>$validateData['email'],
            'password'=>bcrypt($validateData['password']),
        ]);

        // dd($user);

        return redirect()->route('login');
    }

    function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username'=>'required|string|max:255',
            'password'=>'required',
        ]);

        // dd(Auth::attempt($credentials));

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login has failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
