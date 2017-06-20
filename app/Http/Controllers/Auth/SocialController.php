<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $facebook=Social::where('provider_user_id',$user->id)->where('provider','facebook')->get();
        if($facebook){
        	$login=User::where('email',$user->email)->first();
        	Auth::login($login);
        	return redirect('/');
        }else{
        	$login=new Social;
        	$login->provider_user_id=$user->id;
        	$login->provider = 'facebook';

        	$u=User::where('email',$user->email)->first();
        	if(!$u){
        		$u=User::create([
        			'email'	=>$user->email,
        			'hoten'	=>$user->name,
        		]);
        	}
        	$login->user_id=$u->id;
        	$login->save();
        	Auth::login($u);
        	return redirect('/');
        }
    }
}
