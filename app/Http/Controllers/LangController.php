<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function getTranslations()
    {
        $locale = session('locale', App::getLocale()); // Get the current locale
        $path = resource_path("js/translations/{$locale}.json");

        if (File::exists($path)) {
            return response()->json(json_decode(File::get($path), true));
        }

        return response()->json([]);
    }

    public function setLocale(Request $request)
    {
        $request->validate([
            'locale' => 'required|string|in:en,it'
        ]);
        App::setLocale($request->locale);
        session(['locale' => $request->locale]);  // Salva il locale nella sessione
        return redirect()->back();
    }
}
