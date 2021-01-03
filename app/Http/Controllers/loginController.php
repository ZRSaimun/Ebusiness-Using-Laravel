<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminpiModel;
use Socialite;

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
                    $req->session()->put('adminuser', $req->email);
                    $req->session()->put('type', $req->email);
                    $req->session()->put('addminpass', $req->pass);
                    $req->session()->put('logged', 'logged');
                    
                    return redirect()->route('adminDashboard');
                }else{
                    $req->session()->flash('msg', 'invalid username or password');
                    return redirect()->route('adminLogin');
                }
    }
    public function githubloginSocialAdmin(){
        return Socialite::driver('github')->redirect();
    }

    public function githubloginSocialRedirectAdmin(Request $req){
        $user = Socialite::driver('github')->user();
        $admin=adminpiModel::where('email',$user->getEmail())
                            ->get();
        
                if(count($admin) > 0){
                    $req->session()->put('adminuser', $admin[0]['email']);
                    $req->session()->put('type', $admin[0]['email']);
                    $req->session()->put('addminpass', $admin[0]['password']);
                    $req->session()->put('logged', 'logged');
            
                    
                   return redirect()->route('adminDashboard');
                }else{
                    $req->session()->flash('msg', 'invalid username or password');
                    return redirect()->route('adminLogin');
                }
    }
}
