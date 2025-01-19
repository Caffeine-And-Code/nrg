<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
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
        return view('admin/home');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('admin.login');
    }

    public function settings()
    {
        $products = Product::all();
        $users = User::all();
        return view('admin.settings',['products' => $products, 'users' => $users]);
    }

    public function destroy(Request $request)
    {
        // destroy this admin account and all its data, then logout
        Auth::guard('admin')->user()->news()->delete();
        Auth::guard('admin')->user()->notifications()->delete();
        Auth::guard('admin')->user()->spinWheelEntries()->delete();
        
        Auth::guard('admin')->user()->delete();
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
