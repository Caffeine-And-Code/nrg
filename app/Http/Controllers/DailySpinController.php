<?php

namespace App\Http\Controllers;

use App\Models\SpinWheelEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailySpinController extends Controller
{
    public function editView()
    {
        $entries = Auth::guard('admin')->user()->spinWheelEntries();
        return view('admin.editDailySpinsMobile', ['entries' => $entries]);
    }
}
