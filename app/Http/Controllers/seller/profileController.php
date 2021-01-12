<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\sellerModel;

class profileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {

            //$userID = $id['id'];
            $user = sellerModel::where('user_id', $request->session()->get('user'))->first();
            // echo $user;
        } else {
            $id = Auth::user();
            //echo $id;
            $request->session()->put('user', $id['id']);
            //echo "fdgfg";
            $userID = $id['id'];
            $user = sellerModel::where('user_id', $userID)->first();
            //echo $user;
        }

        //return view('seller.index')->with('user', $user);
        return view('seller.index', $user);
    }
}