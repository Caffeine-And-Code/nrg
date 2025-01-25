<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SpinWheelEntry;
use App\Models\User;
use App\Services\AdminService;
use App\Services\CheckoutService;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * @var User $user
         */
        $user = auth()->user();
        $news= News::query()->get();
        //TODO: Implement best buy logic
        $products= Product::query()->bestBuy()->withCartQuantity($user)->get();
        $spinWheel = $user->getLastAccess() < Carbon::now()->setTime(0,0,0);
        $spinValue = $spinWheel ? SpinWheelEntry::query()->inRandomOrder()->first() : null;
        $checkout = (new CheckoutService())->getCheckoutData($user);
        $currentPage = 'main.products';
        return view('user.dashboard', compact('news', 'products', 'spinValue', 'spinWheel', 'checkout', 'currentPage'));
    }

    public function search(Request $request){
        $formData = $request->validate([
            'search' => ['nullable', 'string'],
            'product_type' => 'nullable|exists:product_types,id'
        ]);

        /** @var User $user */
        $user = auth()->user();
        $productType = $formData['product_type'] ?? null;
        $search = $formData['search'] ?? "";
        $products = Product::query()->search($search, $productType)->withCartQuantity($user)->withRating()->get();
        $productTypes = ProductType::query()->get();
        $success = session()->get('success');
        $products->map(function(Product $product){
            $product->rating = $product->getRatings()->avg('rating');
            return $product;
        });
        $checkout = (new CheckoutService())->getCheckoutData($user);
        $currentPage = 'main.products';
        return view('user.search', compact('products', 'productTypes', 'search', 'productType', 'checkout', 'success', 'currentPage'));
    }

    public function magicProduct(Request $request) {
        $products = [Product::query()->inRandomOrder()->first()];

        
        /** @var User $user */
        $user = auth()->user();
        $currentPage = 'main.products';
        $productType = $formData['product_type'] ?? null;
        $search = null;
        $productTypes = ProductType::query()->get();
        $success = session()->get('success');
        $checkout = (new CheckoutService())->getCheckoutData($user);
        return view("user.search", compact('products', 'productTypes', 'search', 'productType', 'checkout', 'success', 'currentPage'));
    }
}
