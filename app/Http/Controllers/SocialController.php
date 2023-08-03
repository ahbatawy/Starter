<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service)
    {
        return socialite::driver($service)->redirect();
    }

    public function callback($service)
    {
      return $user = socialite::with($service)->user();
//        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
    }
}
