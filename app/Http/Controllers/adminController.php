<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminpiModel;
use App\Models\sellerpiModel;
use App\Models\retailsellerpiModel;
use App\Models\userModel;
use App\Models\eventModel;
use App\Models\customerpiModel;
use App\Models\reportModel;
use App\Models\productModel;
use App\Models\catagoryModel;
use App\Models\orderlistModel;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Http\Requests\UserRequest;
use App\Http\Requests\eventRequest;

use Validator;
class adminController extends Controller
{
    public function adminDashboard(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        $user = userModel::all();

        $jsonString = file_get_contents(base_path('resources/lang/event.json'));
        $data       = json_decode($jsonString, true);
        
        
        return view('adminViews.admindash')->with('admin',$admin)->with('data', $data)->with('user',$user);
    }

    public function adminProfile(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        return view('adminViews.profile')->with('admin',$admin);
    }

    public function AdminPresonalInfo(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
                                       
        return view('adminViews.editPersonal')->with('admin',$admin);
    }

    public function editAdminPresonalInfo(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->first();

                                        $admin->name            = $req->name; 
                                        $admin->email           = $req->email;
                                        $admin->password        = $req->password;
                                        $admin->phone_no        = $req->phone_no;
                        
                                        if ($admin->save()) {
                                           return redirect()->route('adminProfile');
                                        }else{
                                            return back();
                                        }
    }

    public function adminProfilePic(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        return view('adminViews.editProfilePic')->with('admin',$admin);
    }

    public function editAdminProfilePic(Request $req){
        if ($req->hasFile('myPic')) {
            $file = $req->file('myPic');

            if($file->move('upload', $file->getClientOriginalName())){
        		
                $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->first();
                
                $admin->profile_pic  = $file->getClientOriginalName();

                if($admin->save()){
                    return redirect()->route('adminProfile');
                }else{
                    return back();
                }

        	}else{
        		return back();
        	}
        }
    }

    

    public function sellerListView(Request $req){
        
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        $seller = sellerpiModel::all();
        return view('adminViews.sellerList')->with('admin',$admin)->with('seller',$seller);
    }

    public function blockingSeller(Request $req){
        $id = $req->get('userId');
        $seller = sellerpiModel::where('user_id',$id)
                                ->first();
                                   
                if ($seller->block_status==0) {
                    $seller->block_status = 1;
                    if($seller->save()){
                        return response()->json([
                            'success' => 'Unblock'
                        ]);
                    }else{
                        return back();
                    }
                }else{
                    $seller->block_status = 0;
                    if($seller->save()){
                        return response()->json([
                            'success' => 'block'
                        ]);
                    }else{
                        return back();
                    }
                }
  
    }

    public function deleteSeller(Request $req){
        $id = $req->get('userId');
        sellerpiModel::where('user_id',$id)->delete($id);
        userModel::where('user_id',$id)->delete($id);
        
        return response()->json([
            'success' => 'deleted'
        ]);              

    }

    public function adminAddSellerView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        
        return view('adminViews.addSeller')->with('admin',$admin);
    }

    public function adminAddSeller(UserRequest $req){
        // $req->validate([
        //     'name' => 'required|min:3',
        //     'email'=> 'required',
        //     'type' => 'required'
        // ])->validate();
        $user = new userModel();

                $user->email     = $req->email;
                $user->password  = $req->password;
                $user->type      = 'Seller';
               // $user->picture = 'defaultRetailer';

                if($user->save()){
                    $userS = userModel::where('email',$req->email)
                                        ->where('password',$req->password)
                                        ->get(); 
                   
                    $Seller = new sellerpiModel();

                    $Seller->user_id           = $userS[0]['user_id'];
                    $Seller->name              = $req->name;
                    $Seller->email             = $req->email;
                    $Seller->address           = 'default';
                    $Seller->dob               = Carbon::now();
                    $Seller->phone_no          = '';
                    $Seller->level             = 0;
                    $Seller->selling_point     = 0;
                    $Seller->profile_pic       = 'default.jpg';
                    $Seller->verified          = 1;
                    $Seller->block_status      = 0;
                    $Seller->social_media      = '';
                // $user->picture       = 'defaultRetailer';
                    if ($Seller->save()) {
                        return redirect()->route('adminDashboard');
                    }else{
                        return back();
                    }
                    
                }else{
                    return back();
                }
    }

    public function adminRetailView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        $retail = retailsellerpiModel::all();
        return view('adminViews.retailManagerList')->with('admin',$admin)->with('retail',$retail);
    }

    public function deleteRetail(Request $req){
        $id = $req->get('userId');
        retailsellerpiModel::where('user_id',$id)->delete($id);
        userModel::where('user_id',$id)->delete($id);
        
        return response()->json([
            'success' => 'retailer deleted'
        ]);              

    }

    public function addEventView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        
        return view('adminViews.addEvent')->with('admin',$admin);
    }

    public function addEvent(eventRequest $req){
        $event = new eventModel();

                $event->event_name          = $req->name;
                $event->event_description   = $req->description;

                $eventData=['name'=>$req->name, 'des'=>$req->description];
                $newJsonString = json_encode($eventData, JSON_PRETTY_PRINT);

                file_put_contents(base_path('resources/lang/event.json'), stripslashes($newJsonString));
            
                if($event->save()){
                    return redirect()->route('adminDashboard');
                }else{
                    return back();
                }
    }

    public function eventView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                ->where('password',$req->session()->get('addminpass'))
                                ->get();
        $event = eventModel::all();

        return view('adminViews.pastEvent')->with('admin',$admin)->with('event', $event);
    }
    
    public function customerView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                ->where('password',$req->session()->get('addminpass'))
                                ->get();
        $customer = customerpiModel::all();

        return view('adminViews.customer')->with('admin',$admin)->with('customer', $customer);
    }

    public function customerBanView(Request $req,$id){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                ->where('password',$req->session()->get('addminpass'))
                                ->get();
        $customer = customerpiModel::where('customer_id',$id)
                                    ->get();

        return view('adminViews.customerBan')->with('admin',$admin)->with('customer', $customer);
    }

    public function customerBan(Request $req,$id){
        $customer = customerpiModel::where('customer_id',$id)
                                    ->first();
        $customer->block_status= 1;
        if ($customer->save()) {
            return redirect()->route('customerView');
        }

    }

    public function customerUnban(Request $req,$id){
        $customer = customerpiModel::where('customer_id',$id)
                                    ->first();
        $customer->block_status= 0;
        if ($customer->save()) {
            return redirect()->route('adminDashboard');
        }
    }

    public function aCatagoryView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        // return view('adminViews.catagoryList')->with('admin',$admin);
        $client = new Client();
 
        $response = $client->request('GET', 'http://localhost:5000/getAllTheCatagory');
        if ($response->getStatusCode() == 200) {
            $catagories= json_decode($response->getBody(), true);
            $catagory= json_decode($catagories, true);
           
        return view('adminViews.catagoryList')->with('admin',$admin)->with('catagory',$catagory);
        } else {
            echo "Not get";
        }

    }

    public function revenueView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        // return view('adminViews.catagoryList')->with('admin',$admin);
        $client = new Client();
 
        $response = $client->request('GET', 'http://localhost:5000/allRevenueChart');
        if ($response->getStatusCode() == 200) {
            $reve= json_decode($response->getBody(), true);
            $revv=json_decode($reve, true);
            //dd($revv[1]['priviousMonth']);

            $newJsonString = json_encode($revv, JSON_PRETTY_PRINT);

            file_put_contents(base_path('resources/lang/revenue.json'), stripslashes($newJsonString));
        return view('adminViews.revenueChart')->with('admin',$admin)->with('revv',$revv);
        } else {
            echo "Not get";
        }
    }

    public function adminVerifySellerView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        $seller = sellerpiModel::all();
        return view('adminViews.verifySeller')->with('admin',$admin)->with('seller',$seller);
    }

    public function adminSellerVerify(Request $req){
        $id = $req->get('userId');
        $seller = sellerpiModel::where('user_id',$id)
                        ->first();
          $seller->verified=1;    

        if ($seller->save()) {
            return response()->json([
                'success' => 'seller verified'
            ]);  
        }else{
            return response()->json([
                'failed' => 'seller verification failed'
            ]);
        }
        
        
    }

    public function reportinggView(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                                        ->where('password',$req->session()->get('addminpass'))
                                        ->get();
        $customer = customerpiModel::all();
        $retailer = retailsellerpiModel::all();
        $seller = sellerpiModel::all();
        $report = reportModel::all();
        return view('adminViews.report')->with('admin',$admin)
                                        ->with('customer',$customer)
                                        ->with('retailer',$retailer)
                                        ->with('seller', $seller)
                                        ->with('report',$report);

    }
    public function reportDelete(Request $req){
        $id = $req->get('userId');
        reportModel::where('report_id',$id)->delete($id);
        
        return response()->json([
            'success' => 'we will perform some action'
        ]); 
    }

    public function adminProductList(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                            ->where('password',$req->session()->get('addminpass'))
                            ->get();
        $retailer = retailsellerpiModel::all();
        $seller = sellerpiModel::all();
        $product = productModel::all();
        $catagory = catagoryModel::all();

        return view('adminViews.productList')->with('admin',$admin)
                                            ->with('product',$product)
                                            ->with('retailer',$retailer)
                                            ->with('seller', $seller)
                                            ->with('catagory',$catagory);
    }

    public function adminorderList(Request $req){
        $admin = adminpiModel::where('email',$req->session()->get('adminuser'))
                            ->where('password',$req->session()->get('addminpass'))
                            ->get();
        
        $order = orderlistModel::all();
        $product = productModel::all();
        $customer = customerpiModel::all();

        return view('adminViews.orderList')->with('admin',$admin)
                                            ->with('product',$product)
                                            ->with('order',$order)
                                            ->with('customer', $customer);
                                           
    }
    


}
