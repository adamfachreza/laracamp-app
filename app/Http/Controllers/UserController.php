<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function login(){
        return view('auth.user.login');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function github(){
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallbackGoogle(){
       $callback = Socialite::driver('google')->stateless()->user();
       $data = [
        'name' => $callback->getName(),
        'email' => $callback->getEmail(),
        'avatar' => $callback->getAvatar(),
        'email_verified_at' => date('Y-m-d H:i:s'),
       ];
    //    return $data;
       $user = User::firstOrCreate(['email'=>$data['email']], $data);
       Auth::login($user, true);
       return redirect('/');

    }

    public function handleProviderCallbackGithub(){
        $githubUser = Socialite::driver('github')->user();
        $data = [
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
            'avatar' => $githubUser->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ];
        $user = User::firstOrCreate(['email'=>$data['email']], $data);
       Auth::login($user, true);
       return redirect('/');
     }
}
