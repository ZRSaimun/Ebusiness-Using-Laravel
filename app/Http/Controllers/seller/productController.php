<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\seller\userr;
use App\Models\seller\sellerpi;
use App\Models\seller\productt;

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
        $product = new productt();
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

    public function deleteProductView()
    {
        $product = DB::table('product')->get();
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

    public function publishedProductView()
    {
        $publish = 1;
        $product = DB::table('product')->where('published', $publish)->get();
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

    public function unPublishedProductView()
    {
        $publish = 0;
        $product = DB::table('product')->where('published', $publish)->get();
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