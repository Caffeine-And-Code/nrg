<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

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
        return view('admin.home');
    }

    public function logout()
    {
        if(Auth::guard('admin')->check())
            Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function createDefaultAdmin()
    {
        try{
            $admin = new \App\Models\Admin;
            $admin->email = "admin@admin.it";
            $admin->password = bcrypt("1234");
            $admin->save();
            return "Admin created successfully";
        }catch(\Exception $e){
            if($e->errorInfo[1] == 1062){
                return "Admin already exists";
            }
            return $e->getMessage();
        }
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
