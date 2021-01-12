<?php

namespace App\Http\Controllers\retailseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\retailsellerModel;

class profileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {

            //$userID = $id['id'];
            $user = retailsellerModel::where('user_id', $request->session()->get('user'))->first();
            // echo $user;
        } else {
            $id = Auth::user();
            //echo $id;
            $request->session()->put('user', $id['id']);
            //echo "fdgfg";
            $userID = $id['id'];
            $user = retailsellerModel::where('user_id', $userID)->first();
            //echo $user;
        }

        //return view('retailseller.index')->with('user', $user);
        return view('retailseller.index', $user);
    }
}