<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ApiToken;
use App\Models\Customer;
use App\Models\Configuration;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Frontend\En\DashboardController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //its just a dummy data object.
        $configuration = Configuration::find(1);

        $meta_description = $configuration->meta_description;
        // Sharing is caring
        View::share([ 'meta_description' => $meta_description ]);

        if(!request()->expectsJson()){
            if(empty(Cookie::get('access_token')) && empty(Cookie::get('customer_id'))){
                return redirect()->route('loginPage');
            }else{
                $token = \Crypt::decrypt(Cookie::get('access_token'), false);
                $apiToken = ApiToken::where('token','like','%'.$token.'%')->get();
                if(count($apiToken) == 0){
                    $this->forceLogOut();
                }
            }
            if(Cookie::has('customer_id') && !empty(Cookie::get('customer_id'))){
                $customerID = \Crypt::decrypt(Cookie::get('customer_id'), false);
                $customerEmail = Cookie::get('customer_email');
                $user = Customer::where('email',$customerEmail)->first();
                if($user != null){
                    if(Cookie::has('access_token') && !empty(Cookie::get('access_token'))){
                        /*$token = \Crypt::decrypt(Cookie::get('access_token'), false);


                        $user_type = JWTAuth::payload("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2NhcnRvblwvYXBpXC9jdXN0b21lclwvc2lnbkluIiwiaWF0IjoxNjYxMzgyMTkwLCJleHAiOjE2NjM5NzQxOTAsIm5iZiI6MTY2MTM4MjE5MCwianRpIjoiOXlLZEpvTU1NQjd0eDVnTSIsInN1YiI6NzI2LCJwcnYiOiIxZDBhMDIwYWNmNWM0YjZjNDk3OTg5ZGYxYWJmMGZiZDRlOGM4ZDYzIiwibGwiOiIyMDIyLTA4LTI1IDAyOjAzOjEwIn0.OnTKlL4Jr_zy3C6ZPE5p2Jvg-IaOeDZFA1Qz_6wwj2k")['user_type'] ?? null;
                        $user = JWTAuth::toUser("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2NhcnRvblwvYXBpXC9jdXN0b21lclwvc2lnbkluIiwiaWF0IjoxNjYxMzgyMTkwLCJleHAiOjE2NjM5NzQxOTAsIm5iZiI6MTY2MTM4MjE5MCwianRpIjoiOXlLZEpvTU1NQjd0eDVnTSIsInN1YiI6NzI2LCJwcnYiOiIxZDBhMDIwYWNmNWM0YjZjNDk3OTg5ZGYxYWJmMGZiZDRlOGM4ZDYzIiwibGwiOiIyMDIyLTA4LTI1IDAyOjAzOjEwIn0.OnTKlL4Jr_zy3C6ZPE5p2Jvg-IaOeDZFA1Qz_6wwj2k");
                        dd($user,$user_type);*/
                    }
                    $cartCount = Cart::where('customer_id',$user->id)->count();
                    Cookie::queue(Cookie::make('cart_count', $cartCount, 720));

                    if(Cookie::get('customer_type') != null && Cookie::get('customer_premium') != null){
                        if((int)$user->user_type != (int)\Crypt::decrypt(Cookie::get('customer_type'), false) || (int)\Crypt::decrypt(Cookie::get('customer_premium'), false) != (int)$user->premium){
                            $userTypeNew = $user->user_type ?? 1 ;
                            $userPremiumNew = $user->premium ?? 0 ;
                            Cookie::queue(Cookie::make('customer_type', $userTypeNew, 500));
                            Cookie::queue(Cookie::make('customer_premium', $userPremiumNew, 500));
                        }
                    }
                    /*$userTypeNew = $user->user_type ?? 1 ;
                    $userPremiumNew = $user->premium ?? 0 ;
                    Cookie::queue(Cookie::make('customer_type', $userTypeNew, 500));
                    Cookie::queue(Cookie::make('customer_premium', $userPremiumNew, 500));*/
                }else{
                    $this->forceLogOut();
                }
            }

        }

    }


    public function forceLogOut()
    {
        Cookie::queue(Cookie::forget('customer_id'));
        Cookie::queue(Cookie::forget('customer_name'));
        Cookie::queue(Cookie::forget('customer_email'));
        Cookie::queue(Cookie::forget('access_token'));
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        Session::forget('landingCredentials');
        Session::forget('latitude');
        Session::forget('longitude');
        Session::forget('district_id');
        Session::forget('language');
        Session::forget('resultStatus');
        Session::forget('district_name');

        return \redirect()->route('indexPage');
    }

}
