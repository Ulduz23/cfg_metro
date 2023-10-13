<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class VerifyAcceptOnlyJsonRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $e = new NotAcceptableHttpException(__('lang.notAcceptable', ['accept' => $request->header('Accept')]));

        switch($request->header('Accept'))
        {
            case 'application/json':
                return $next($request);
            break;

            case 'text/html':
                throw $e;
            break;

            default:
                return response()->json([
                    'message' => $e->getMessage(),
                ], $e->getStatusCode());
        }
    }
}