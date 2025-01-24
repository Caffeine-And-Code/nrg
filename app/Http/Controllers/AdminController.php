<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use App\Services\NotificationService;
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
        $orders = Order::query()->with(["products", "classroom","User"])->get();

        $admin = Auth::guard('admin')->user();
        $notifications = (new NotificationService())->getNotificationsAdmin($admin);;

        return view('admin/home',compact('orders','notifications'));
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
        $delivery_cost = Auth::guard('admin')->user()->delivery_cost;
        $fm_prize = Auth::guard('admin')->user()->fm_prize;
        $fm_target = Auth::guard('admin')->user()->fm_target;
        $news = News::all();
        $entries = Auth::guard('admin')->user()->spinWheelEntries()->get();
        $classes = Classroom::all();
        return view('admin.settings',["classes" => $classes ,"entries" => $entries ,"news" => $news,'products' => $products, 'users' => $users, 'delivery_cost' => $delivery_cost, 'fm_prize' => $fm_prize, 'fm_target' => $fm_target]);
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

    public function updateDeliveryCost(Request $request)
    {
        $request->validate([
            'cost' => 'required|numeric|min:0',
        ]);

        $delivery_cost = $request->cost;
        Auth::guard('admin')->user()->update(['delivery_cost' => $delivery_cost]);


        return redirect()->route('admin.settings');
    }

    public function updateFidelity(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
            'target' => 'required|numeric|min:0',
        ]);

        $fm_prize = $request->price;
        $fm_target = $request->target;
        Auth::guard('admin')->user()->update(['fm_prize' => $fm_prize, 'fm_target' => $fm_target]);

        return redirect()->route('admin.settings');
    }
}
