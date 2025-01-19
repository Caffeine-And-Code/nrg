<?php

namespace App\Http\Controllers;

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
}
