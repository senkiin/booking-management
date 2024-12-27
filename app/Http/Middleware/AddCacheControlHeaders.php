<?php

namespace Illuminate\Http\Middleware;

use Closure;

class AddCacheControlHeaders
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
        $response = $next($request);

        if ($response->headers->has('Cache-Control')) {
            return $response;
        }

        $response->headers->add(['Cache-Control' => 'no-cache, private']);

        return $response;
    }
}
