<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
//use App\User;

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

    		return redirect()->route('customer.index');
    	}else{
    		$req->session()->flash('msg', 'Invalid Email/password. Try again!');
    		return redirect('/login');
    	}
    }
}
