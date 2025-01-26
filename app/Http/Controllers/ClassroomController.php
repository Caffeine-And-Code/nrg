<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function editView()
    {
        $class = Classroom::all();
        return view('admin.editClassroomMobile',['classes' => $class]);
    }

    public function destroy(Request $request)
    {
        $class = Classroom::find($request->id);
        $class->orders()->each(function($order){
            $order->products()->detach();
        });
        $class->orders()->delete();
        $class->delete();
        return redirect()->back();
    }

    public function add(Request $request)
    {
        $request->validate([
            "classes" => "required|array",
            "classes.*.name" => "required|string"
        ]);

        foreach ($request->classes as $class) {
            Classroom::create([
                "name" => $class["name"]
            ]);
        }
        return redirect()->back();
    }
}
