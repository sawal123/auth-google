<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            // dd($user->avatar);
            $finduser = User::where('google_id', $user->getId())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }else{
                $newUser = User::create([
                    'uid'=> Str::uuid(),
                    'name'=> $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password'=> bcrypt('1234567'),
                    'gambar'=> $user->avatar
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        }catch(\Throwable $th){
            return redirect()->route('login');
        }
    }
}
