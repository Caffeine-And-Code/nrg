<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{

    public function login()
    {
        if (Auth::guard('seller')->check())
            return redirect()->route('seller.dashboard');
        return view('seller.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        if (Auth::guard("seller")->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('seller.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        $news = News::all() ?? [];
        return view('seller/home',['news' => $news]);
    }

    public function logout(Request $request)
    {
        if(Auth::guard('seller')->check())
        {
            Auth::guard('seller')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('seller.login');
    }

    public function settings()
    {
        return view('seller.settings');
    }
}
