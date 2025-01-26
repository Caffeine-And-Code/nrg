<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function store(Request $request)//: \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'images' => 'required|array', // Assicurati che sia un array
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288', // Valida ogni immagine nell'array
        ]);

        foreach ($request->file("images") as $key => $image) {
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/news');
            $image->move($destinationPath, $name);
            $currentImagePath = '/images/news/' . $name;

            News::create([
                'image_path' => $currentImagePath,
                "admin_id" => auth()->guard('admin')->user()->id,
            ]);
        }

        return back()
            ->with('success','News created successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $news = News::find($id);
        // Delete the image from the public folder
        $image_path =  $news->image_path;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $news->delete();

        return back()
            ->with('success','News deleted successfully.');
    }

    public function edit(): \Illuminate\Contracts\View\View
    {
        $news = News::all()->where('admin_id', auth()->guard('admin')->user()->id);
        return view('admin.editNewsMobile', compact('news'));
    }
}
