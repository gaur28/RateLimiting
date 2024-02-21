<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RateLimiting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        // dump($ip);die;
        $checkActiveSession = Session::driver()->has('currentSession'.$ip);

        if($checkActiveSession){
            return response()->json([
                'message' => 'an active sesssion is already in progress',
                'option' => [
                    'continue' => url('api/continue-current-session'),
                    'close' => url('api/close-curent-session')
                    ]
                ], 429);
            }

            Session::put(['currentSession'.$ip => true]);
            // dump($checkActiveSession);
            return $next($request);
    }
}
