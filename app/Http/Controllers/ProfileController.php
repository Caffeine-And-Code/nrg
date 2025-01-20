<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Services\AdminService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(OrderService $orderService, AdminService $adminService){
        /** @var User $user */
        $user = auth()->user();
        $orders = $orderService->getOrders($user);
        $fmTarget = $adminService->getFidelityMeterTarget();
        $actualSpent = $user->getTotalSpent();
        $success = session()->get('success');
        return view('user.profile', compact('orders', 'user', 'success', 'fmTarget', 'actualSpent'));
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
        $user->delete();
        return route('admin.settings');
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
    // public function search(Request $request){
    //     $query = $request->get('query');
    //     $users = User::search($query)->get();
    //     return view('admin.settings', compact('users'));
    // }

    public function search(Request $request){
        $query = $request->get('searchInput');
        $users = User::query()->where('username', 'like', "%$query%")->get();
        $products = Product::all();
        return view('admin.settings', compact('users', 'products'));
    }
}
