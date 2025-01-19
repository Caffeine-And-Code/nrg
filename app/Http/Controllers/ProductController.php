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
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "perc_discount" => 'numeric',
            "type" => 'required|integer',
        ]);

        //check if type exists
        if(!ProductType::find($request->type)){
            return back()->with('error', 'Product type does not exist.');
        }

        $path = null;

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $path = $request->image->move(public_path('images/products'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
            'perc_discount' => $request->perc_discount ? $request->perc_discount : 0,
            'product_type_id' => $request->type,
        ]);


        return redirect()->route("admin.settings")->with('success', 'Product added successfully.');
    }
}
