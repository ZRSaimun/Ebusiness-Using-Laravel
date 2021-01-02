<?php

namespace App\Http\Controllers\seller;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\seller\userr;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {

        return view('login.index');
    }

    public function verify(Request $req)
    {

        $user = userr::where('email', $req->username)->where('password', $req->password)->first();
        //echo $user;
        if ($user['password'] == $req->password) {
            $req->session()->put('user', $user['user_id']);
            return redirect('/seller');
            //return redirect()->route('home.index');
        } else {
            echo 'wrong user';
        }
    }
}