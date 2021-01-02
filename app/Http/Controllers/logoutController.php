<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    function index(Request $req){
        $req->session()->flush();

        return redirect('/');
    }
}
