<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\News;
use App\Models\Notification;
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

class NotificationController extends Controller
{
    public function show(Request $request){
        /** @var User $user */
        $user = auth()->user();
        $notifications = Notification::query()->where("user_id", $user->getId())->get();
        return view('user.notifications', compact('notifications'));
    }
}
