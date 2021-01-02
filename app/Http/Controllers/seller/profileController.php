<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerpi;

class profileController extends Controller
{
    public function index(Request $request)
    {
        $user = sellerpi::where('user_id', $request->session()->get('user'))->first();
        //return view('seller.index')->with('user', $user);
        return view('seller.index', $user);
    }
}