<?php

namespace App\Http\Controllers\retailseller;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\retailseller\userr;
use App\Models\retailsellerModel;
use App\Models\productModel;
use App\Models\userModel;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {

        return view('login.index');
    }

    public function verify(Request $req)
    {
        $validationData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:12'
        ]);
        $user = userModel::where('email', $req->email)->where('password', $req->password)->first();
        //echo $user;
        if ($user['password'] == $req->password) {
            $req->session()->put('user', $user['user_id']);
            return redirect('/retailseller');
            //return redirect()->route('home.index');
        } else {
            echo 'wrong user';
        }
    }
}