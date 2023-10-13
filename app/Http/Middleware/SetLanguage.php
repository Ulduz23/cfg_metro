<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = config('translatable.locales');
        $locale = $request->header('Accept-Language') ?? config('app.locale');

        if ($request->accepts(['text/html']))
        {
            $locale = session()->get('locale', config('app.locale'));
            session()->put('locale', $locale);
        }

        if (!in_array($locale, $availableLocales))
        {
            return abort(400, __("lang.available_locales", [
                'locales' => implode(', ', $availableLocales)
            ]));
        }

        \App::setLocale($locale);

        return $next($request);
    }
}
