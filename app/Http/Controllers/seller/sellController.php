<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\sellerModel;
use App\Models\productModel;
use App\Models\userModel;
use App\Models\couponModel;
use App\Models\catagoryModel;

class sellController extends Controller
{
    public function reviewProductView(Request $request)
    {
        $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.reviewProductList')->with('product', $product);
    }
    public function reviewProductDetails(Request $request, string $slug)
    {
        //$productID = $request->productID;
        //echo $slug;
        $order_status = 'deliverd';
        $paid = true;

        $orderList = DB::table('review')->where('product_id', $slug)->get();

        return view('seller.reviewProductDetails')->with('orderList', $orderList);
        //echo $orderList;
    }

    public function totalIncomeView(Request $request)
    {
        $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.totalIncomeList')->with('product', $product);
    }
    public function totalIncomeDetails(Request $request, string $slug)
    {
        //$productID = $request->productID;
        //echo $slug;
        $order_status = 'deliverd';
        $paid = true;

        $orderList = DB::table('orderlist')->where('product_id', $slug)->where('order_status', $order_status)->where('paid', $paid)->get();

        return view('seller.totalIncomeDetails')->with('orderList', $orderList);
        //echo $orderList;
    }

    public function deliveredOrderView(Request $request)
    {
        $order_status = 'deliverd';
        $orderList = DB::table('orderlist')->where('user_id', $request->session()->get('user'))->where('order_status', $order_status)->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        //echo $orderList;
        return view('seller.productListdelivered')->with('orderList', $orderList);
    }


    public function pendingOrderView(Request $request)
    {
        $order_status = 'pending';
        $orderList = DB::table('orderlist')->where('user_id', $request->session()->get('user'))->where('order_status', $order_status)->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        //echo $orderList;
        return view('seller.productListPending')->with('orderList', $orderList);
    }
    public function pendingOrder(Request $request)
    {
        $orderID = $request->orderID;
        //echo $slug;
        //$order_status = 'deliverd';

        /*DB::table('orderlist')->where('order_id', $slug)->update([
            'order_status' => $order_status,
            'paid' => $paid
        ]);*/

        $vvv = DB::table('orderlist')->where('order_id', $orderID)->get();
        foreach ($vvv as $value) {
            $orderQuantity = $value->quantity;
            $productID = $value->product_id;
            //echo $value;
        }
        $vv = DB::table('product')->where('product_id', $productID)->get();
        foreach ($vv as $value) {
            $productQuantity = $value->quantity;
            //echo $value;
        }
        $newQuantity = $productQuantity - $orderQuantity;
        //echo $newQuantity;

        //echo $quantity;
        //echo $productID;
        //update product set quantity = quantity - ? where product_id = ?
        //DB::table('product')->where('product_id', $productID)->update(['quantity' => ('quantity') - $quantity]);

        DB::table('product')->where('product_id', $productID)->update(['quantity' => $newQuantity]);



        $order_status = 'deliverd';
        $paid = 1;
        $orderList = DB::table('orderlist')->where('order_id', $orderID)->update(
            [
                'order_status' => $order_status,
                'paid' => $paid
            ]
        );

        $order_status = 'pending';
        $orderList = DB::table('orderlist')->where('user_id', $request->session()->get('user'))->where('order_status', $order_status)->get();
        return view('seller.productListPending')->with('orderList', $orderList);
    }

    public function reportCustomerView(Request $request)
    {
        $order_status = 'deliverd';
        $orderList = DB::table('orderlist')->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        //echo $orderList;
        return view('seller.reportCustomerList')->with('orderList', $orderList);
    }
    public function reportCustomerDetails(Request $request, string $slug)
    {
        //$productID = $request->productID;
        //echo $slug;
        $order_status = 'deliverd';
        $paid = true;
        $orderList = DB::table('customerpi')->where('customer_id', $slug)->get();
        return view('seller.reportCustomerDetails')->with('orderList', $orderList);
        //echo $orderList;
    }
    public function reportCustomer(Request $request, string $slug)
    {
        //$productID = $request->productID;
        //echo $slug;

        DB::table('report')->insert([
            'fromuser' => $request->session()->get('user'),
            'touser' => $request->customerID,
            'report_msg' => $request->report
        ]);



        $orderList = DB::table('orderlist')->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        //echo $orderList;
        return view('seller.reportCustomerList')->with('orderList', $orderList);
    }
}