<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OrderService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(OrderService $orderService){
        /** @var User $user */
        $user = auth()->user();
        $orders = $orderService->getLastOrders($user);
        return view('user.profile', compact('orders', 'user'));
    }

    public function editUser(Request $request){
        $formData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
        ]);
        /** @var User $user */
        $user = auth()->user();
        $user->update($formData);
        return redirect()->route('user.profile')->with('success', 'Profile updated');
    }
}
