<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $currentImagePath = '/images' . '/' . $name;

        News::create([
            'image' => $currentImagePath,
        ]);

        return back()
            ->with('success','News created successfully.');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        // Delete the image from the public folder
        $image_path = public_path() . $news->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        
        $news->delete();

        return back()
            ->with('success','News deleted successfully.');
    }
}
