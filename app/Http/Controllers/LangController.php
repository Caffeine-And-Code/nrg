<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LangController extends Controller
{
    public function setLocale(Request $request)
    {
        $request->validate([
            'locale' => 'required|string|in:en,it'
        ]);

        $before = App::getLocale();
        
        App::setLocale($request->locale);

        Cookie::queue(Cookie::forget('locale'));

        // Salva la preferenza linguistica in un cookie (1 anno di durata)
        Cookie::queue('locale', $request->locale, 60 * 24 * 365);
        
        return "before: $before, after: ".App::getLocale();
    }
}
