<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\orderlist;

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
                ->with('cart', $cart)->with('prodlist', $prodlist)->with('custid', $custid);
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

        return view('customerViews.settings')
                ->with('info', $custInfo);
    }

    public function reportProblem(){
            return view('customerViews.report_problem');
    }



    public function updateAccountInfo(Request $req){
        $custid = $req->session()->get('customerid'); 

        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3|max:50',
            'address'=> 'required|max:50',
            'dob' => 'required',
            'phoneno' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:15',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]); 


        if($validation->fails()){
                return back()
                        ->with('errors', $validation->errors())
                        ->withInput();
        }else{
                $file = $req->file('image');
                $originalFileName = $file->getClientOriginalName();
                $fileName = 'customerid_' . $custid . '_' . $originalFileName;

        	if($file->move('customerPP', $fileName)){

                        $name            = $req->name;
                        $address         = $req->address;
                        $dob             = $req->dob;
                        $phoneNo         = $req->phoneno;
                        $profilePic      = $fileName;

                        $updated = DB::update('update customerpi set name = ?,address=?,dob=?,phone_no=?,profile_pic=? where customer_id = ?',[$name,$address,$dob,$phoneNo,$fileName,$custid]);

                        if($updated){
                                $req->session()->flash('update_msg', 'Success! Your account info updated.');
                                return redirect()->route('customer.settings');
                        }else{
                                $req->session()->flash('update_msg', 'Nothing to update. Try renaming your image file');
                                return redirect()->route('customer.settings');
                        }  
                }else{
                        echo "upload error.";
                }              
        }
    }


    public function cancelOrder($id){
        $deleted = DB::delete('delete from orderlist where order_id = ?',[$id]);

        if($deleted){
                return redirect()->route('customer.pending_orders');
        }else{
                echo "ERROR";
        }
    }

    public function removeFromCart($id){
        $deleted = DB::delete('delete from cart where cart_id = ?',[$id]);
        
        if($deleted){
                return redirect()->route('customer.cart');
        }else{
                echo "ERROR";
        }
    }

    public function confirmCart($custid){

        $data = DB::table('cart')
        ->where('customer_id', $custid)
        ->get();

        foreach ($data as $row) {

                $pid = $row->product_id;
                $dt = DB::table('product')
                        ->select('user_id')
                        ->where('product_id', $pid)
                        ->first();

                //print_r($dt->user_id);
                $orderlist = new orderlist();
                $orderlist->customer_id     = $custid;
                $orderlist->user_id         = $dt->user_id;
                $orderlist->product_id      = $pid;
                $orderlist->quantity        = $row->quantity;
                $orderlist->order_status    = "pending"; 
                $orderlist->date            = date("Y-m-d");

                if($orderlist->save()){
                        //$deleted = DB::delete('delete from cart where cart_id = ?',[$id]);
                        return redirect()->route('customer.pending_orders');
                }else{
                        return back();
                }

        }
    }









}
