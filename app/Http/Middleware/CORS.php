<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class CORS
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
//        return $next($request)->header('Access-Control-Allow-Origin' , '*')
//            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
//            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');

        $content = $next($request);
        return ( new Response($content) )->header('Access-Control-Allow-Origin' , '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin');

//        if (
//            ! $this->cors->isCorsRequest($request)
//            || $request->headers->get('Origin') == $request->getSchemeAndHttpHost()
//        ) {
//            return $next($request);
//        }
//        if ($this->cors->isPreflightRequest($request)) {
//            return $this->cors->handlePreflightRequest($request);
//        }
//        if ( ! $this->cors->isActualRequestAllowed($request)) {
//            abort(403);
//        }
//        $response = $next($request);
//        return $this->cors->addActualRequestHeaders($response, $request);
    }
}
