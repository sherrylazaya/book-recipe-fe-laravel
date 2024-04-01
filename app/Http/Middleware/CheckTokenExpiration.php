<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = Session::get('token');

        if(!$token) {
            return redirect('/login')->with('error', 'Token not found. Please log in.');
        }

        $parts = explode('.', $token);
        if(count($parts) == 3){
            $payload = json_decode(base64_decode($parts[1], true));
            if(isset($payload->exp)){
                $expiration = $payload->exp;
                if(time() > $expiration){
                    Session::flush();
                    return redirect('/login')->with('error', 'Token has expired. Please log in again.');
                }
            }
        }
        return $next($request);
    }
}
