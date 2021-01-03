<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminpiModel;

class loginController extends Controller
{
    public function adminLogin(){
        return view('adminViews.adminLog');
    }

    public function verifyAdmin(Request $req){
        $admin=adminpiModel::where('email',$req->email)
                ->where('password', $req->pass)
                ->get();
                if(count($admin) > 0){
                    $req->session()->put('user', $req->email);
                    $req->session()->put('type', $req->email);
                    $req->session()->put('pass', $req->pass);
                    $req->session()->put('logged', 'logged');
                    
                    return redirect()->route('adminDashboard');
                }else{
                    $req->session()->flash('msg', 'invalid username or password');
                    return redirect()->route('adminLogin');
                }
    }
}
