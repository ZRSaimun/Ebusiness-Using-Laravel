<?php

namespace App\Http\Controllers\retailseller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\retailsellerModel;
use App\Models\productModel;
use App\Models\userModel;
use App\Models\couponModel;
use App\Models\catagoryModel;
use GuzzleHttp\Client;


class productController extends Controller
{
    public function index(Request $request)
    {
        $catagoryID = DB::table('catagory')->get();
        //echo $catagoryID;
        //return view('retailseller.addProduct', compact($catagoryID));
        return view('retailseller.addProduct')->with('catagoryID', $catagoryID);
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
            return view('retailseller.addProduct')->with('catagoryID', $catagoryID);
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            $catagoryID = DB::table('catagory')->get();
            return view('retailseller.addProduct')->with('catagoryID', $catagoryID);
        }
    }

    public function deleteProductView(Request $request)
    {
        $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('retailseller.addProduct', compact($catagoryID));
        return view('retailseller.productListDelete')->with('product', $product);
    }
    public function deleteProduct(Request $request)
    {
        $productID = $request->productID;

        if (DB::table('product')->where('product_id', $productID)->delete()) {
            $request->session()->flash('status', 'successfully Deleted!');
            $product = DB::table('product')->get();
            return view('retailseller.productListDelete')->with('product', $product);
        }
    }

    public function publishedProductView(Request $request)
    {
        $publish = 1;
        $product = DB::table('product')->where('published', $publish)->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('retailseller.addProduct', compact($catagoryID));
        return view('retailseller.productListPublished')->with('product', $product);
    }
    public function publishedProduct(Request $request)
    {
        $productID = $request->productID;
        $publish = 1;

        if (DB::table('product')->where('product_id', $productID)->update(['published' => 0])) {

            $request->session()->flash('status', 'ProductID:' . $productID . ' successfully UnPublished!');
            $product = DB::table('product')->where('user_id', $request->session()->get('user'))->where('published', $publish)->get();
            return view('retailseller.productListPublished')->with('product', $product);
        }
    }

    public function unPublishedProductView(Request $request)
    {
        $publish = 0;
        $product = DB::table('product')->where('published', $publish)->where('published', $publish)->where('user_id', $request->session()->get('user'))->get();
        //echo $product;
        //return view('retailseller.addProduct', compact($catagoryID));
        return view('retailseller.productListUnPublished')->with('product', $product);
    }
    public function unPublishedProduct(Request $request)
    {
        $productID = $request->productID;
        $publish = 0;

        if (DB::table('product')->where('product_id', $productID)->update(['published' => 1])) {

            $request->session()->flash('status', 'successfully Published!');
            $product = DB::table('product')->where('user_id', $request->session()->get('user'))->where('published', $publish)->get();
            return view('retailseller.productListUnPublished')->with('product', $product);
        }
    }

    public function editProductView(Request $request)
    {
        $publish = 0;
        $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
        $catagoryID = DB::table('catagory')->get();
        //echo $product;
        //return view('retailseller.addProduct', compact($catagoryID));
        return view('retailseller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
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

            $product = DB::table('product')->where('user_id', $request->session()->get('user'))->get();
            $catagoryID = DB::table('catagory')->get();
            return view('retailseller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
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
            return view('retailseller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
        } else {
            $request->session()->flash('status', 'Unsuccessfully!');
            $product = DB::table('product')->get();
            $catagoryID = DB::table('catagory')->get();
            return view('retailseller.productListEdit')->with('product', json_decode($product, true))->with('catagoryID', $catagoryID);
        }*/
    }

    public function addCouponView(Request $request)
    {
        //$catagoryID = DB::table('coupon')->get();
        //echo $catagoryID;
        //return view('retailseller.addProduct', compact($catagoryID));
        //echo "fucntion";
        return view('retailseller.addCoupon');
    }
    public function addCouponView1(Request $request)
    {
        //$catagoryID = DB::table('coupon')->get();
        //echo $catagoryID;
        //return view('retailseller.addProduct', compact($catagoryID));
        //echo "fucntion";
        return view('retailseller.addCatagory');
    }

    public function addCoupon(Request $request)
    {
        //echo "fucntion";
        //return view('retailseller.addCatagory');
        $coupon = new couponModel();
        //$result = 1;
        $coupon->coupon_code =  $request->coupon_code;
        $coupon->percentage =  $request->percentage;
        //echo $product;
        /*DB::table('coupon_retailseller')->insert([
            'couponretailseller' =>  $coupon->coupon_code,
            'percentage' => $coupon->percentage
        ]);*/
        //echo "sdfsdf";
        echo $coupon->coupon_code;
        echo $coupon->percentage;
        //echo $product;

        if (DB::table('coupon')->insert([
            'coupon_code' =>  $coupon->coupon_code,
            'percentage' => $coupon->percentage
        ])) {
            $request->session()->flash('status', 'successful!');
            return response()->json([
                'success' => 'added'
            ]);
            //return json_encode($result);
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            return response()->json([
                'success' => 'not added'
            ]);
        }
    }


    public function addCatagoryView(Request $request)
    {
        //$catagoryID = DB::table('coupon')->get();
        //echo $catagoryID;
        //return view('retailseller.addProduct', compact($catagoryID));
        return view('retailseller.addCatagory');
    }
    public function addCatagory(Request $request)
    {
        //$catagory = new catagoryModel();
        $catagoryName =  $request->catagory_name;

        //echo $product;
        try {
            $client = new Client();
            $res = $client->request('POST', 'http://127.0.0.1:3000/retailseller/addCatagory', ['form_params' => [
                'userName' => $request->session()->get('user'),
                'catagoryName' => $catagoryName
            ]]);
            $res = json_decode($res->getBody(), true);
            //echo $key_value =   $res['affectedRows'];
            $request->session()->flash('status', 'successful!');
            return view('retailseller.addCatagory');
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $request->session()->flash('status', 'Unable to connect!');
            return view('retailseller.addCatagory');
        }



        /*if (DB::table('catagory')->insert([
            'catagory_name' =>  $catagory->catagory_name,
        ])) {
            $request->session()->flash('status', 'successful!');
            return view('retailseller.addCatagory');
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            return view('retailseller.addCatagory');
        }*/
    }

































    /*public function verify(Request $req)
    {

        $user = userr::where('email', $req->username)->where('password', $req->password)->first();
        //echo $user;
        if ($user['password'] == $req->password) {
            $req->session()->put('user', $user['user_id']);
            return redirect('/retailseller');
            //return redirect()->route('home.index');
        } else {
            echo 'wrong user';
        }
    }*/
}