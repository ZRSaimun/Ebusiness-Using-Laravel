<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    public function dashboard(Request $req){
        $email = $req->session()->get('email');

        $user = DB::table('customerpi')
                ->where('email', $email)
                ->first();
        
        $arrCustomerPI = (array) $user;
        $req->session()->put('customerid', $arrCustomerPI['customer_id']);

        return view('customerViews.index')->with('custInfo', $arrCustomerPI); 
    }


    public function pendingOrders(Request $req){
        $custid = $req->session()->get('customerid');

        $orderlist = DB::table('orderlist')
                ->where('customer_id', $custid)
                ->where('order_status', 'pending')
                ->get();

        $prodlist = DB::table('product')
                ->select('product_id', 'product_name')
                ->get();
        
        //$arr = (array) $orderlist;
        //echo count($arr); 

        return view('customerViews.pending_order')
                    ->with('orderlist', $orderlist)->with('prodlist', $prodlist);
    }


    public function orderHistory(Request $req){
        $custid = $req->session()->get('customerid');

        $orderlist = DB::table('orderlist')
                ->where('customer_id', $custid)
                ->where('order_status', 'delivered')
                ->get();

        $prodlist = DB::table('product')
                ->select('product_id', 'product_name')
                ->get();

        return view('customerViews.order_history')
                    ->with('orderlist', $orderlist)->with('prodlist', $prodlist);
    }


    public function cart(Request $req){
        $custid = $req->session()->get('customerid');

        $cart = DB::table('cart')
                ->where('customer_id', $custid)
                ->get();

        $prodlist = DB::table('product')
                ->select('product_id', 'product_name', 'price')
                ->get(); 

        return view('customerViews.cart')
                ->with('cart', $cart)->with('prodlist', $prodlist);
    }


    public function wishlist(Request $req){
        $custid = $req->session()->get('customerid');

        $list = DB::table('wishlist')
                ->where('customer_id', $custid)
                ->get();

        $prodlist = DB::table('product')
                ->select('product_id', 'product_name', 'price')
                ->get(); 

        return view('customerViews.wishlist')
                ->with('list', $list)->with('prodlist', $prodlist);
    }


    public function settings(Request $req){
        $custid = $req->session()->get('customerid');

        $data = DB::table('customerpi')
                ->where('customer_id', $custid)
                ->first(); 

        $custInfo = (array) $data;
        //print_r($data);

        return view('customerViews.settings')
                ->with('info', $custInfo);
    }


    public function reportProblem(){
            return view('customerViews.report_problem');
    }

}
