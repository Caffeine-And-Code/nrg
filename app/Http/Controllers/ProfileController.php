<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
use App\Services\AdminService;
use App\Services\NotificationService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(OrderService $orderService, AdminService $adminService){
        /** @var User $user */
        $user = auth()->user();
        $orders = $orderService->getOrders($user);
        $fmTarget = $adminService->getFidelityMeterTarget();
        $fmPrize = $adminService->getFidelityMeterPrice();
        $notifications = (new NotificationService())->getNotifications($user);
        $success = session()->get('success');
        return view('user.profile', compact('orders', 'user', 'success', 'fmTarget', 'user', 'notifications', 'fmPrize'));
    }

    public function editUser(Request $request){
        $formData = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,email,'.auth()->id()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        /** @var User $user */
        $user = auth()->user();
        $user->setUsername($formData['username'])
            ->setEmail($formData['email']);
        if(isset($formData['password'])){
            $user->setPassword(Hash::make($formData['password']));
        }
        $user->save();
        return redirect()->route('user.profile')->with('success', 'Profile updated');
    }


    public function edit(Request $request){
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);
        $user = User::query()->find($request->get('id'));
        return view("admin.editUsersMobile", compact('user'));
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);
        $user = User::query()->find($request->get('id'));
        $user->ratings()->delete();
        $user->notifications()->delete();
        $user->cartProducts()->detach();
        $user->orders()->each(function($order){
            $order->products()->detach();
        });
        //delete all the entries of the products_in_order table that have the user_id
        $user->orders()->delete();
        // delete the user
        $user->delete();
        return redirect()->back();
    }

    public function addDiscount(Request $request){
        $request->validate([
            'id' => 'required|exists:users,id',
            'discount' => 'required|numeric|min:0|max:200'
        ]);
        $user = User::query()->find($request->get('id'));
        $user->setDiscountPortfolio($user->getDiscountPortfolio() + $request->get('discount'));
        $user->save();
        return redirect()->back();
    }

    // uncomment this function to enable search functionality with MeiliSearch
    public function search(Request $request){
        $query = $request->input('searchInput');
        $users = User::search($query)->get();
        $products = Product::all();
        $delivery_cost = Auth::guard('admin')->user()->delivery_cost;
        $fm_prize = Auth::guard('admin')->user()->fm_prize;
        $fm_target = Auth::guard('admin')->user()->fm_target;
        $news = News::all();
        $entries = Auth::guard('admin')->user()->spinWheelEntries()->get();
        $classes = Classroom::all();
        return view('admin.settings', compact('classes', 'entries', 'news', 'products', 'users', 'delivery_cost', 'fm_prize', 'fm_target'));
    }

    // public function search(Request $request){
    //     $query = $request->get('searchInput');
    //     $users = User::query()->where('username', 'like', "%$query%")->get();
    //     $products = Product::all();
    //     $delivery_cost = Auth::guard('admin')->user()->delivery_cost;
    //     $fm_prize = Auth::guard('admin')->user()->fm_prize;
    //     $fm_target = Auth::guard('admin')->user()->fm_target;
    //     $news = News::all();
    //     $entries = Auth::guard('admin')->user()->spinWheelEntries()->get();
    //     $classes = Classroom::all();
    //     return view('admin.settings', compact('classes', 'entries', 'news', 'products', 'users', 'delivery_cost', 'fm_prize', 'fm_target'));
    // }
}
