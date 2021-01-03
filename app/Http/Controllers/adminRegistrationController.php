<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\retailsellerpiModel;
use App\Models\adminpiModel;
use Carbon\Carbon;


class adminRegistrationController extends Controller
{
    public function registrationOfSellerRView(){
        return view('adminViews.registerR');
    }
    public function registrationOfSellerR(Request $req){
        $user = new userModel();

                $user->email     = $req->email;
                $user->password  = $req->password;
                $user->type      = 'retailSeller';
               // $user->picture = 'defaultRetailer';

                if($user->save()){
                    $userR = userModel::where('email',$req->email)
                                        ->where('password',$req->password)
                                        ->get(); 
                   
                    $retailSeller = new retailsellerpiModel();

                    $retailSeller->user_id           = $userR[0]['user_id'];
                    $retailSeller->name              = $req->email;
                    $retailSeller->email             = $req->email;
                    $retailSeller->address           = 'default';
                    $retailSeller->dob               = Carbon::now();
                    $retailSeller->phone_no          = '';
                    $retailSeller->level             = 0;
                    $retailSeller->selling_point     = 0;
                    $retailSeller->profile_pic       = 'default.jpg';
                // $user->picture       = 'defaultRetailer';
                    if ($retailSeller->save()) {
                        return redirect()->route('adminDashboard');
                    }else{
                        return back();
                    }
                    
                }else{
                    return back();
                }
    }

    public function adminRegistrationView(){
        return view('adminViews.adregister');
    }
    public function adminRegistration(Request $req){
        $admin = new adminpiModel();
                $admin->name            = $req->name; 
                $admin->email           = $req->email;
                $admin->password        = $req->password;
                $admin->profile_pic     = 'default.jpg';
                $admin->phone_no     = '';

                if ($admin->save()) {
                   return redirect()->route('adminDashboard');
                }else{
                    return back();
                }
    }
}
