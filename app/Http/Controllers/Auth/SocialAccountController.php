<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback($provider)
    {

        
            $user = \Socialite::with($provider)->user();
       
          

        return view('boards.test',compact('user'));
    }
}
