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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function Laravel\Prompts\error;

class OrderController extends Controller
{
    public function show(Request $request){
        $formData = $request->validate([
            "order_id" => "required|exists:orders,id",
        ]);
        $orderId = intval($formData['order_id']);
        /** @var User $user */
        $user = auth()->user();
        $order = Order::query()->with(["products", "classroom"])->where("user_id", $user->getId())->find($orderId);
        if($order === null){
            throw new NotFoundHttpException();
        }
//        dd($order->toArray());
        return view('user.order', compact('order'));
    }
}
