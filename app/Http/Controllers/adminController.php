<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminpiModel;
use App\Models\sellerpiModel;
use App\Models\userModel;

class adminController extends Controller
{
    public function adminDashboard(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        return view('adminViews.admindash')->with('admin',$admin);
    }

    public function adminProfile(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        return view('adminViews.profile')->with('admin',$admin);
    }

    public function AdminPresonalInfo(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
                                       
        return view('adminViews.editPersonal')->with('admin',$admin);
    }

    public function editAdminPresonalInfo(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->first();

                                        $admin->name            = $req->name; 
                                        $admin->email           = $req->email;
                                        $admin->password        = $req->password;
                                        $admin->phone_no        = $req->phone_no;
                        
                                        if ($admin->save()) {
                                           return redirect()->route('adminProfile');
                                        }else{
                                            return back();
                                        }
    }

    public function adminProfilePic(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        return view('adminViews.editProfilePic')->with('admin',$admin);
    }

    public function editAdminProfilePic(Request $req){
        if ($req->hasFile('myPic')) {
            $file = $req->file('myPic');

            if($file->move('upload', $file->getClientOriginalName())){
        		
                $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->first();
                
                $admin->profile_pic  = $file->getClientOriginalName();

                if($admin->save()){
                    return redirect()->route('adminProfile');
                }else{
                    return back();
                }

        	}else{
        		return back();
        	}
        }
    }

    

    public function sellerListView(Request $req){
        
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        $seller = sellerpiModel::all();
        return view('adminViews.sellerList')->with('admin',$admin)->with('seller',$seller);
    }

    public function blockingSeller(Request $req){
        $id = $req->get('userId');
        $seller = sellerpiModel::where('user_id',$id)
                                ->first();
                                   
                if ($seller->block_status==0) {
                    $seller->block_status = 1;
                    if($seller->save()){
                        return response()->json([
                            'success' => 'Unblock'
                        ]);
                    }else{
                        return back();
                    }
                }else{
                    $seller->block_status = 0;
                    if($seller->save()){
                        return response()->json([
                            'success' => 'block'
                        ]);
                    }else{
                        return back();
                    }
                }
  
    }

    public function deleteSeller(Request $req){
        $id = $req->get('userId');
        sellerpiModel::where('user_id',$id)->delete($id);
        userModel::where('user_id',$id)->delete($id);
        
        return response()->json([
            'success' => 'deleted'
        ]);              

    }

    

}
