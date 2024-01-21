<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index() {
        error_reporting(0);
        $short = ShortLink::where('uid_user', Auth::user()->uid);
        return view('page.index',[
            'data' => $short->get(),
        ]);
    }
}
