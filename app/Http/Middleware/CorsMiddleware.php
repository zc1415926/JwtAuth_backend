<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods',
                'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With')
            ->header('Access-Control-Allow-Credentials', 'true');

       /* $headers = [
            'Access-Control-Allow-Origin' =>' *',
            'Access-Control-Allow-Methods'=>' POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=>' Content-Type, Accept, Authorization, X-Requested-With'
        ];

        if($request->getMethod() == "OPTIONS") {
            return \Response::make('OK', 200, $headers);
        }

        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;*/
    }
}
