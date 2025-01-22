<?php

namespace App\Http\Controllers;

use App\Events\OrderUpdate;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Cashier;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

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
        $discount = (new UserService())->getUsableCredit($user, $total);
        $classrooms = Classroom::query()->get();
        $success = session()->get('success');
        return view('user.checkout', compact('products', 'shippingCost', 'total', 'classrooms', 'success', 'discount'));
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
            $checkout_url = $userService->createOrder($user, Carbon::parse($formData['delivery_time']), intval($formData['classroom_id']));
            return redirect($checkout_url);
        }
    }

    /**
     * @throws InternalErrorException
     * @throws ApiErrorException
     */
    public function checkoutSuccess(Request $request){
        /** @var User $user */
        $user = auth()->user();
        $session = $this->getStripeOrderFromSession($request);
        if ($session->payment_status !== 'paid') {
            throw new InternalErrorException();
        }

        $orderId = $session['metadata']['order_id'] ?? null;
        $order = Order::query()->findOrFail($orderId);
        switch ($order->getStatus()){
            case Order::STATUS_CREATED:
                DB::beginTransaction();
                $order->setStatus(Order::STATUS_PAID)
                    ->save();
                $fidelityUnlocked = (new UserService())->updateFidelity($user, $order);
                DB::commit();
                Event::dispatch(new OrderUpdate($order));

                return view('user.checkout-success', compact('order', 'fidelityUnlocked'));
            case Order::STATUS_PAID:
                return view('user.checkout-success', compact('order'));
            case Order::STATUS_CANCELED:
            default:
                throw new InternalErrorException("Order was cancelled");

        }

    }

    /**
     * @throws InternalErrorException
     * @throws ApiErrorException
     */
    public function checkoutError(Request $request){
        $session = $this->getStripeOrderFromSession($request);
        if ($session->payment_status === 'paid') {
            throw new InternalErrorException();
        }

        $orderId = $session['metadata']['order_id'] ?? null;
        $order = Order::query()->findOrFail($orderId);
        /** @var User $user */
        $user = auth()->user();
        if($order->getStatus() !== Order::STATUS_PAID){
            DB::beginTransaction();
            $order->setStatus(Order::STATUS_CANCELED)
                ->save();
            $user->setDiscountPortfolio($user->getDiscountPortfolio() + $order->getUsedPortfolio())->save();
            (new OrderService())->restoreCartFromOrder($order, $user);
            DB::commit();

            Event::dispatch(new OrderUpdate($order));
            return view('user.checkout-error', compact('order'));
        }
        else{
            throw new InternalErrorException("Order was already paid");
        }
    }

    /**
     * @throws InternalErrorException
     * @throws ApiErrorException
     */
    private function getStripeOrderFromSession(Request $request): \Stripe\Checkout\Session
    {
        $sessionId = $request->get('session_id');

        if ($sessionId === null) {
            throw new InternalErrorException();
        }

        return Cashier::stripe()->checkout->sessions->retrieve($sessionId);
    }
}
