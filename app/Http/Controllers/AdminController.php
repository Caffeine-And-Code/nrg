<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function login()
    {
        if (Auth::guard('admin')->check())
            return redirect()->route('admin.dashboard');
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        if (Auth::guard("admin")->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        $news = News::all() ?? [];
        return view('admin/home',['news' => $news]);
    }

    public function logout()
    {
        if(Auth::guard('admin')->check())
            Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
