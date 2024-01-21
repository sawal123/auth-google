<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        if(Auth::user()){
           return redirect()->back();
        }
        return view('auth.login');
    }
    public function register()
    {
        if(Auth::user()){
            return redirect()->back();
         }
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $validate =  Validator::make($request->all(), [
            'nama' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required'
        ]);
        $validate->validate();

        $user= User::create([
            "uid"=> Str::uuid(),
            "name" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);
        Auth::login($user);
        return redirect(route('index'));
    }

    public function authLogin(Request $request){
       
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        }
        else{
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
