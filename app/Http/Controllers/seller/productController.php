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


class productController extends Controller
{
    public function index(Request $request)
    {
        $catagoryID = DB::table('catagory')->get();
        //echo $catagoryID;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.addProduct')->with('catagoryID', $catagoryID);
    }
    public function addProduct(Request $request)
    {
        $product = new productModel();
        $published = 0;
        $average_rating = 0;
        $exclusive = 0;
        $product->user_id = $request->session()->get('user');
        $product->product_name =  $request->name;
        $product->quantity =  $request->quantity;
        $product->price =  $request->price;
        $product->catagory_name = $request->catagory;
        //echo "img name: " . $file->getClientOriginalName();
        $file =  $request->file('myImg');
        $file->move('upload', $file->getClientOriginalName());
        //$product->product_img = "upload/" . $file->getClientOriginalName();
        $product->product_img = $file->getClientOriginalName();
        $product->average_rating = $average_rating;
        $product->description =  $request->description;
        $product->published =  $published;
        $product->exclusive = $exclusive;
        $vvv = DB::table('catagory')->where('catagory_name', $product->catagory_name)->first('catagory_id');
        foreach ($vvv as $value) {
            $product->catagory_id = $value;
        }
        //echo $product;
        if (DB::table('product')->insert([
            'user_id' => $request->session()->get('user'),
            'product_name' => $product->product_name,
            'quantity' => $product->quantity,
            'price' =>  $product->price,
            'catagory_id' => $product->catagory_id,
            'product_img' => $product->product_img,
            'average_rating' => $product->average_rating,
            'description' =>  $product->description,
            'published' => $product->published,
            'exclusive' => $product->exclusive
        ])) {
            $request->session()->flash('status', 'successful!');
            $catagoryID = DB::table('catagory')->get();
            return view('seller.addProduct')->with('catagoryID', $catagoryID);
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            $catagoryID = DB::table('catagory')->get();
            return view('seller.addProduct')->with('catagoryID', $catagoryID);
        }
    }

    public function deleteProductView(Request $request)
    {
        $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.productListDelete')->with('product', $product);
    }
    public function deleteProduct(Request $request)
    {
        $productID = $request->productID;

        if (DB::table('product')->where('product_id', $productID)->delete()) {
            $request->session()->flash('status', 'successfully Deleted!');
            $product = DB::table('product')->get();
            return view('seller.productListDelete')->with('product', $product);
        }
    }

    public function publishedProductView(Request $request)
    {
        $publish = 1;
        $product = DB::table('product')->where('published', $publish)->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.productListPublished')->with('product', $product);
    }
    public function publishedProduct(Request $request)
    {
        $productID = $request->productID;
        $publish = 1;

        if (DB::table('product')->where('product_id', $productID)->update(['published' => 0])) {

            $request->session()->flash('status', 'ProductID:' . $productID . ' successfully UnPublished!');
            $product = DB::table('product')->where('published', $publish)->get();
            return view('seller.productListPublished')->with('product', $product);
        }
    }

    public function unPublishedProductView(Request $request)
    {
        $publish = 0;
        $product = DB::table('product')->where('published', $publish)->where('published', $publish)->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.productListUnPublished')->with('product', $product);
    }
    public function unPublishedProduct(Request $request)
    {
        $productID = $request->productID;
        $publish = 0;

        if (DB::table('product')->where('product_id', $productID)->update(['published' => 1])) {

            $request->session()->flash('status', 'successfully Published!');
            $product = DB::table('product')->where('published', $publish)->get();
            return view('seller.productListUnPublished')->with('product', $product);
        }
    }

    public function editProductView(Request $request)
    {
        $publish = 0;
        $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
        $catagoryID = DB::table('catagory')->get();
        //echo $product;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
    }

    public function editProduct(Request $request)
    {
        $productID = $request->productID;
        $product = new productModel();
        $published = 0;
        $average_rating = 0;
        $exclusive = 0;

        /*$product->user_id = $request->session()->get('user');
        $product->product_name =  $request->name;
        $product->quantity =  $request->quantity;
        $product->price =  $request->price;
        $product->catagory_name = $request->catagory;
        //echo "img name: " . $file->getClientOriginalName();
        $file =  $request->file('myImg');
        $file->move('upload', $file->getClientOriginalName());
        //$product->product_img = "upload/" . $file->getClientOriginalName();
        $product->product_img = $file->getClientOriginalName();
        $product->average_rating = $average_rating;
        $product->description =  $request->description;
        $product->published =  $published;
        $product->exclusive = $exclusive;*/

        $product->user_id = $request->session()->get('user');
        $product->product_name =  $request->name;
        $product->quantity =  $request->quantity;
        $product->price =  $request->price;
        $product->catagory_name = $request->catagory;
        //echo "img name: " . $file->getClientOriginalName();
        $file =  $request->file('myImg');
        $file->move('upload', $file->getClientOriginalName());
        //$product->product_img = "upload/" . $file->getClientOriginalName();
        $product->product_img = $file->getClientOriginalName();
        $product->average_rating = $average_rating;
        $product->description =  $request->description;
        $product->published =  $published;
        $product->exclusive = $exclusive;

        $vvv = DB::table('catagory')->where('catagory_name', $product->catagory_name)->first('catagory_id');
        foreach ($vvv as $value) {
            $product->catagory_id = $value;
        }
        //echo $product;
        //$product->save();



        if (DB::table('product')->where('product_id', $productID)->update([
            'product_name' => $product->product_name,
            'quantity' => $product->quantity,
            'price' =>  $product->price,
            'catagory_id' => $product->catagory_id,
            'product_img' => $product->product_img,
            'average_rating' => $product->average_rating,
            'description' =>  $product->description,
            'published' => $product->published,
            'exclusive' => $product->exclusive
        ])) {
            //echo "ressss: ";
            //return response()->json($product);

            //return response()->json(['success' => 'Data is successfully added']);

            $product = DB::table('product')->get();
            $catagoryID = DB::table('catagory')->get();
            return view('seller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
        }




























        /*if (DB::table('product')->where('product_id', $productID)->update([
            'product_name' => $product->product_name,
            'quantity' => $product->quantity,
            'price' =>  $product->price,
            'catagory_id' => $product->catagory_id,
            'product_img' => $product->product_img,
            'average_rating' => $product->average_rating,
            'description' =>  $product->description,
            'published' => $product->published,
            'exclusive' => $product->exclusive
        ])) {
            $request->session()->flash('status', 'successfully Updated!');
            $product = DB::table('product')->get();
            $catagoryID = DB::table('catagory')->get();
            return view('seller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
        } else {
            $request->session()->flash('status', 'Unsuccessfully!');
            $product = DB::table('product')->get();
            $catagoryID = DB::table('catagory')->get();
            return view('seller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
        }*/
    }

    public function addCouponView(Request $request)
    {
        //$catagoryID = DB::table('coupon')->get();
        //echo $catagoryID;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.addCoupon');
    }
    public function addCoupon(Request $request)
    {
        $coupon = new couponModel();
        $coupon->coupon_code =  $request->coupon_code;
        $coupon->percentage =  $request->percentage;
        //echo $product;
        DB::table('coupon_seller')->insert([
            'couponSeller' =>  $coupon->coupon_code,
            'percentage' => $coupon->percentage
        ]);

        if (DB::table('coupon')->insert([
            'coupon_code' =>  $coupon->coupon_code,
            'percentage' => $coupon->percentage
        ])) {
            $request->session()->flash('status', 'successful!');
            return view('seller.addCoupon');
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            return view('seller.addCoupon');
        }
    }


    public function addCatagoryView(Request $request)
    {
        //$catagoryID = DB::table('coupon')->get();
        //echo $catagoryID;
        //return view('seller.addProduct', compact($catagoryID));
        return view('seller.addCatagory');
    }
    public function addCatagory(Request $request)
    {
        $coupon = new catagoryModel();
        $coupon->catagory_name =  $request->catagory_name;

        //echo $product;

        if (DB::table('catagory')->insert([
            'catagory_name' =>  $coupon->catagory_name,
        ])) {
            $request->session()->flash('status', 'successful!');
            return view('seller.addCatagory');
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            return view('seller.addCatagory');
        }
    }

































    /*public function verify(Request $req)
    {

        $user = userr::where('email', $req->username)->where('password', $req->password)->first();
        //echo $user;
        if ($user['password'] == $req->password) {
            $req->session()->put('user', $user['user_id']);
            return redirect('/seller');
            //return redirect()->route('home.index');
        } else {
            echo 'wrong user';
        }
    }*/
}