<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateIncludeParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $include = $request->query('include');

        if ($include && !is_array($include)) {
            return response()->json(['error' => 'Invalid include parameter. It must be an array.'], 400);
        }

        return $next($request);
    }
}
