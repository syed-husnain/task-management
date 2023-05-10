<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->bearerToken() != null){
            $apiToken = ApiToken::where('token','like','%'.$request->bearerToken().'%')->get();
            if(count($apiToken) == 0){
                return response()->json(['status' => '2','message' => 'Invalid Token']);
            }
        }
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $apiToken = ApiToken::where('user_id',$user->id)->get();
            if(count($apiToken) == 0){
                return response()->json(['status' => '2','message' => 'Invalid Token']);
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => '2','message' => 'Invalid Token']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => '2','message' => 'Invalid Token']);
            }else{
                return response()->json(['status' => '2','message' => 'Invalid Token']);
            }
        }
        return $next($request);

    }
}
