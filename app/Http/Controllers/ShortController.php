<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShortController extends Controller
{
    public function short(Request $request){
        $validasi = Validator::make($request->all(),[
            'url'=> 'required|string|max:255',
            'short'=> 'required|max:25',
        ]);

        if ($validasi->fails()) {
            return redirect('/')
                        ->withErrors($validasi)
                        ->withInput();
        }
        

        if(!Auth::user()){
            return redirect()->intended('login');
        }else{
            $cekShort = ShortLink::where('short', $request->input('short'))->first();
            // dd($cekShort);
            if($cekShort){
                return redirect('/')->with('error', 'Nama link sudah ada');
            }
            $short = ShortLink::create([
                'uid_user' => Auth::user()->uid,
                'link' => $request->input('url'),
                'short'=> $request->input('short'),
                'view'=> 0
            ]);
        }

        return redirect('/')->with('success', 'Link Berhasil dishort');
    }
    public function cek($data){
        $data = ShortLink::where('short', $data)->firstOrFail();
        $data->view = $data->view + 1;
        $data->save();
        return redirect()->away($data->link);
    }
}
