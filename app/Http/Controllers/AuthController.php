<?php

namespace App\Http\Controllers;

use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request){
        // $client = new \GuzzleHttp\Client;
        try{
            $response = Http::post(config('services.passport.login_endpoint'), [
                'grant_type'=>'password',
                'client_id'=>config('services.passport.client_id'),
                'client_secret'=>config('services.passport.client_secret'),
                'username'=> $request->username,
                'password'=>$request->password
            ]);

            return $response->getBody();

        }catch(\GuzzleHttp\Exception\BadResponseException $e){
            if($e->getCode() == 400){
                return response()->json('invalid Request Please Enter a Username Or a Password '.$e->getCode());
            }else if($e->getCode() == 401){
                return response()->json('Your Credentials are incorrect.please try again '.$e->getCode());
            }
        }
    }

    public function logout(){
        auth()->user()->tokens->each(function($token,$key){
            $token->delete();
        });
        return response()->json('logged out successfully',200);
    }
}
