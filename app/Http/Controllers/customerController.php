<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function dashboard(){
        return view('customerViews.index'); 
    }
}
