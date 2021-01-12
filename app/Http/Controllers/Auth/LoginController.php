<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\sellerModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /*public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('seller');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
*/
    protected $redirectTo = '/seller';
    protected $fillable = ['user_id', 'email'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(Request $request)
    {
        $user = Socialite::driver('github')->user();
        $userr = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            [
                'email' => $user->email
            ],
            [
                'name' => $user->name,
                'password' => Hash::make(Str::random(24))
            ]
        );

        $vvv = DB::table('users')->where('email', $userr->email)->get();
        foreach ($vvv as $value) {
            $id = $value->id;
            $em = $value->email;
            $nm = $value->name;
        }
        echo $id;
        echo $em;
        $request->session()->put('user', $id);
        $uss = sellerModel::insert(
            [
                'user_id' => $id,
                'name' =>  $nm,
                'email' => $em,
                'address' => '',
                'phone_no' => '0',
                'profile_pic' => '',
                'social_media' => '',
                'level' => '0',
                'selling_point' => '0',
                'block_status' => '0',
                'verified' => '0'
            ]
        );

        return redirect('seller');
    }
}