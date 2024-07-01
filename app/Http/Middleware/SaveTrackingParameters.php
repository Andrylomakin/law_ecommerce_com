<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SaveTrackingParameters
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $utmParameters = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'fbclid', 'gclid'];

        foreach ($utmParameters as $param) {
            if ($request->has($param)) {
                Cookie::queue($param, $request->query($param), 4320); // сохраняем на 3 дня
            }
        }

        // Проверяем наличие заголовка Referer
        if ($request->headers->has('referer') && !$request->cookies->has('referer')) {
            $referer = $request->headers->get('referer');
            Cookie::queue('referer', $referer, 4320); // сохраняем на 3 дня
        }

        return $next($request);
    }
}
