<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleFromCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Recupera il locale dal cookie o usa il valore predefinito
        $locale = $request->cookie('locale', config('app.locale'));

        // Imposta il locale nell'applicazione
        App::setLocale($locale);

        Log::info('Middleware eseguito: locale impostato a ' . $locale);


        return $next($request);
    }
}
