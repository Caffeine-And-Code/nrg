<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SpinWheelEntry;
use App\Models\User;
use App\Services\AdminService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function editProductCart(Request $request, UserService $userService){
        $formData = $request->validate([
            "product_id" => "required",
            "quantity" => "numeric|min:0"
        ]);

        $product = Product::query()->find($formData['product_id']);
        $quantity = intval($formData['quantity']) ?? -1;
        /** @var User $user */
        $user = auth()->user();
        if($quantity === 0){
            $userService->removeProductFromCart($user, $product);
        }
        else{
            $userService->addProductToCart($user, $product, $quantity);
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }
    public function index(ProductService $productService, AdminService $adminService)
    {
        /** @var User $user */
        $user = auth()->user();
        $products = $productService->getProductsInChart($user);
        $shippingCost = $adminService->getDeliveryCost();
        $total = $productService->getCheckoutTotalPrice($user);
        $classrooms = Classroom::query()->get();
        $success = session()->get('success');
        return view('user.checkout', compact('products', 'shippingCost', 'total', 'classrooms', 'success'));
    }

    public function checkout(Request $request, OrderService $orderService, AdminService $adminService, UserService $userService){
        $formData = $request->validate([
            "delivery_time" => [
                "required",
                "date",
                function ($attribute, $value, $fail) {
                    // Ensure delivery_time is at least 15 minutes from now
                    if (Carbon::parse($value)->lt(Carbon::now()->addMinutes(15))) {
                        $fail("The $attribute must be at least 15 minutes from now.");
                    }
                },
            ],
            'classroom_id' => 'required|exists:classrooms,id'
        ]);

        /** @var User $user */
        $user = auth()->user();
        if(!$userService->canCreateOrder($user)){
            return back()->withErrors(["error" => "You can't create an order at the moment."]);
        }
        else{
            $order = $userService->createOrder($user, Carbon::parse($formData['delivery_time']), intval($formData['classroom_id']));
            return view("user.checkout_complete", compact('order'));
        }
    }
}
