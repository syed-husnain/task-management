<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::user() != null && !Auth::user()->status) {
                Auth::logout();
            }
        if (Auth::user() != null) {
//            $response = $next($request);
            $headers = [
                'Cache-Control'      => 'nocache, no-store, max-age=0, must-revalidate',
                'Pragma'     => 'no-cache',
                'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
            ];
            $response = $next($request);
            foreach($headers as $key => $value) {
                $response->headers->set($key, $value);
            }

            return $response;
        }
        return redirect('/admin-login');
    }
}
