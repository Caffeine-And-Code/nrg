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
}
