<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;
class SocialAuthController extends Controller
{
   public function redirect()
    {
        return \Socialite::driver('facebook')->redirect();
    }

    public function callback()
	{	 
	$facebook = Socialite::driver('facebook')->user();
	// dd($facebook);	
    $user = User::where('facebook_id', $facebook->id)->first();
    // register (if no user)
    if (!$user) {
    	$nameParts = explode(' ', $facebook->name);
        $user = new User;
        $user->facebook_id = $facebook->id;
        $user->first_name=$nameParts[0];
        if(!empty($nameParts[1]))
        $user->last_name=$nameParts[1];
    	else
    	$user->last_name ="";
        $user->email =$facebook->email;
        $user->profile_image = $facebook->avatar;
        $user->password = "";

        $user->save();
    }

    // login
    Auth::loginUsingId($user->id);

    return redirect('/');
	}


	public function googleRedirect()
    {
        return \Socialite::driver('google')->redirect();
    }


    public function googleCallback()
    {
            $googleUser = \Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
            	$nameParts = explode(' ', $googleUser->name);
                $user = new User;
               	$user->first_name=$nameParts[0];
		        if(!empty($nameParts[1]))
		        $user->last_name=$nameParts[1];
		    	else
		    	$user->last_name ="";
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');

    }
}
