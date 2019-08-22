<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback($provider)
    {
        $user = \Socialite::with($provider)->stateless()->user();
        $login_user = User::where('social_id',$user->getId())->first();
        if($login_user){
            Auth::login($login_user);
            return redirect('/')->with('flash_message',$user->getId().'アカウントでのログインが完了しました。');
        }
    }
}
