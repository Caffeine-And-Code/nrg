<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\SpinWheelEntry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $news= News::query()->get();
        //TODO: Implement best buy logic
        $products= Product::query()->limit(5)->get();
        /**
         * @var User $user
         */
        $user = auth()->user();
        $spinWheel = $user->getLastAccess() < Carbon::now()->setTime(0,0,0);
        $spinValue = $spinWheel ? SpinWheelEntry::query()->inRandomOrder()->first() : null;
        return view('user.dashboard', compact('news', 'products', 'spinValue', 'spinWheel'));
    }

    public function search(Request $request){

    }
}
