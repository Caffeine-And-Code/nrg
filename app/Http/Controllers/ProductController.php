<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function addProductView(Request $request)
    {
        if($request->id){
            $product = Product::find($request->id);
            return view('admin.productAddView',["product" => $product]);
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

    public function editProduct(Request $request){
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "perc_discount" => 'numeric',
            "type" => 'required|integer',
        ]);

        $product = Product::find($request->id);

        if(!$product){
            return back()->with('error', 'Product does not exist.');
        }

        //check if type exists
        if(!ProductType::find($request->type)){
            return back()->with('error', 'Product type does not exist.');
        }

        //remove old image if the old one is a valid photo
        if($product->image && file_exists($product->image)){
            unlink($product->image);
        }

        $path = null;
        if($request->hasFile('image') ){
            $imageName = time().'.'.$request->image->extension();
            $path = $request->image->move(public_path('images/products'), $imageName);
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $path;
        $product->perc_discount = $request->perc_discount ? $request->perc_discount : 0;
        $product->product_type_id = $request->type;
        $product->save();

        return redirect()->route("admin.settings")->with('success', 'Product edited successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $product = Product::find($request->id);
        if($product){
            $product->cartUsers()->detach();
            $product->orders()->detach();
            $product->ratings()->delete();
            $product->delete();
            return redirect()->route("admin.settings")->with('success', 'Product deleted successfully.');
        }
        return redirect()->route("admin.settings")->with('error', 'Product does not exist.');
    }

    public function toggleVisibility(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $product = Product::find($request->id);
        if($product){
            $product->isVisible = !$product->isVisible;
            $product->save();
            return redirect()->route("admin.settings")->with('success', 'Product visibility toggled successfully.');
        }
        return redirect()->route("admin.settings")->with('error', 'Product does not exist.');
    }

    public function search(Request $request)
    {
        $query = $request->input('searchInput');

        // Cerca i prodotti usando Meilisearch
        $products = Product::search($query)->get();
    
        return view("admin.settings", ["products" => $products]);
    }
}
