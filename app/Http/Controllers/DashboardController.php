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
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class DashboardController extends Controller
{
    public function index()
    {
        $wheelProbability = 90;
        /**
         * @var User $user
         */
        $user = auth()->user();
        $news= News::query()->get();
        //TODO: Implement best buy logic
        $products= Product::query()->bestBuy()->withCartQuantity($user)->get();
        $spinWheel = $user->getLastAccess() < Carbon::now()->setTime(0,0,0);
        $sessionKey = 'wheel_' . Carbon::now()->format('Y-m-d');
        if(!session()->has($sessionKey) || session()->get($sessionKey) !== null){
            session()->put($sessionKey, $spinWheel ? (rand(min: 0, max: 100) < $wheelProbability ? 0 : SpinWheelEntry::query()->inRandomOrder()->first()->getId()) : null);
        }
        $spinValue = session()->get($sessionKey, null);
        $spinValues = $spinWheel ? SpinWheelEntry::query()->get() : null;
        $wheel_last_win = session()->get("wheel_win", null);
        $checkout = (new CheckoutService())->getCheckoutData($user);
        $currentPage = 'main.products';
        return view('user.dashboard', compact('news', 'products', 'spinValue', 'spinValues', 'spinWheel', 'checkout', 'currentPage', 'wheel_last_win'));
    }

    public function search(Request $request){
        $formData = $request->validate([
            'search' => ['nullable', 'string'],
            'product_type' => 'nullable|exists:product_types,id',
            "magic_product" => "nullable|boolean"
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

        if($request->has('magic_product')){
            $products = [Product::query()->search($search, $productType)->inRandomOrder()->withCartQuantity($user)->withRating()->first()];
        }

        return view('user.search', compact('products', 'productTypes', 'search', 'productType', 'checkout', 'success', 'currentPage'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws InternalErrorException
     * @throws NotFoundExceptionInterface
     */
    public function collect_wheel_discount(Request $request){
        $sessionKey = 'wheel_' . Carbon::now()->format('Y-m-d');
        if(session()->has($sessionKey)){
            /** @var User $user */
            $user = auth()->user();
            $heelEntryId = session()->get($sessionKey);
            session()->forget($sessionKey);
            $wheelText = "";
            $wheelValue = 0;
            if($heelEntryId != 0){
                $entry = SpinWheelEntry::query()->find($heelEntryId);
                $wheelText = $entry->getText();
                $wheelValue = intval($entry->getPrize());
            }
            else{
                $wheelText = "null_win_reserved_field_immutable_1237871263";
                $wheelValue = 0;
            }
            session()->put("wheel_win", $wheelText);
            $user->setLastAccess(Carbon::now()->setTime(0,0,0))
                ->setDiscountPortfolio($user->getDiscountPortfolio() + $wheelValue)
                ->save();
            return redirect()->back();
        }
        throw new InternalErrorException();
    }
}
