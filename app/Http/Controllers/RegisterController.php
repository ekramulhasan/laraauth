<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{


    public function register(){

        return view('res&log.register');
    }


    public function registerUser(RegisterRequest $request){

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'password' => $request->password,
            'password' => Hash::make($request->password)

        ]);

        Session::flash('status', 'successfully registed complete');

        // return back();

        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([

            'email' => "your email is not valid"

        ])->onlyInput('email');

    }


    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }

    public function login(){

        return view('res&log.login');

    }


    public function loginUser(LoginRequest $request){

        // dd($request->all());

        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, $request->filled('remember'))){

            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([

            'email' => "wrong credential"

        ])->onlyInput('email');


    }




}
