<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
            "name" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);
        return redirect(route('login'))->with('success', 'Register Berhasil');
    }

    public function authLogin(Request $request){
        //validasi data yang dikirim
        // $credentials = $this->validate($request, [
        //     'email'=>'required|email:dns',
        //     'password'=> 'required|string'
        // ]);
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
        return redirect(route('register'));
    }
}
