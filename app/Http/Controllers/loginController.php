<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
//use App\User;

use App\Models\adminpiModel;
use Socialite;


class loginController extends Controller
{
    public function adminLogin(){
        return view('adminViews.adminLog');
    }

    public function verifyLogin(Request $req){

        $user = DB::table('user')
                ->where('email', $req->email)
                ->where('password', $req->password)
                ->first();

        $arrUserData = (array) $user;                                 //typeCasting
        //print_r($arrUD); 
        //echo count($arrUserData);

        if(count($arrUserData) > 0){
    		$req->session()->put('email', $arrUserData['email']);
            $req->session()->put('type', $arrUserData['type']);

            if($req->session()->get('type') == 'customer'){
                return redirect()->route('customer.index');
            }
    		
    	}else{
    		$req->session()->flash('msg', 'Invalid Email/password. Try again!');
    		return redirect('/login');
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


