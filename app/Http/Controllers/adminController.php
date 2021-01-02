<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function adminDashboard(){
        return view('adminViews.admindash');
    }

    public function adminProfile(){
        return view('adminViews.profile');
    }

    public function editAdminPresonalInfo(){
        return view('adminViews.editPersonal');
    }

    public function editAdminProfilePic(){
        return view('adminViews.editProfilePic');
    }

}
