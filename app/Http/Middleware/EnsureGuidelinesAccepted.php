<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureGuidelinesAccepted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && is_null($request->user()->guidelines_accepted_at)) {
            if (!$request->routeIs('onboarding.*')) {
                return redirect()->route('onboarding.guidelines');
            }
        }

        return $next($request);
    }
}
