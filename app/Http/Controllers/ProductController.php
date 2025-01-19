<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProductView(Request $request)
    {
        if($request->product_id){
            $product = Product::find($request->product_id);
            return view('admin.productAddView',compact('product'));
        }
        return view('admin.productAddView',["product" => null]);
    }

    public function addProduct(Request $request)
    {
        return $request->all();
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "perc_discount" => 'required',
            "type" => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        return back()
            ->with('success', 'You have successfully added a new product.')
            ->with('image', $imageName);
    }
}
