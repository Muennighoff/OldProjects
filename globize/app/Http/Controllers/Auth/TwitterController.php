<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        // app()->configure('services');
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('twitter')->user();        
        //check if user exists and log user in
        // echo '<pre>';
         // var_dump($userSocial); 
        $id = $userSocial->id;
        if(!isset($id)) return redirect()->route('login');
        // var_dump($userSocial)exit;
        $name = $userSocial->name;
        $avatar = $userSocial->avatar;
        $user = User::where('twitter_id', $id)->first();

        if($user){
            if(Auth::loginUsingId($user->id)){
               return redirect()->route('home');
            }
        }
         //else sign the user up

        $userSignup = User::create([
            'name' => $name,
            'password' => bcrypt('1234'),
            'avatar'=> $avatar,
            'twitter_id'=> $id,
            'is_activated'=> '1'
        ]);
        // var_dump($userSignup);
        // echo 'ok1';
        // exit;
        //finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect()->route('home');
            }
        }
        return redirect()->route('login');

    }


}
