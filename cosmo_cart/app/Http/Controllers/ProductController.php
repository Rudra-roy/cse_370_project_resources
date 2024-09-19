<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct() {
        $products = Product::latest()->get();
        return view('allproduct', compact('products'));
    }

    public function AddProduct() {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('addproduct', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request) {
        $request->validate([
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'count' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $image = $request->file('product_image');
        $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'price' => $request->price,
            'count' => $request->count,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_image' => $image_url,
        ]);

        Category::where('id', $category_id)->increment('product_count',1);
        Subcategory::where('id', $subcategory_id)->increment('subcategory_product_count',1);

        return redirect()->route('allproduct')->with('message', 'Product added successfully');
    }

    public function ProductEditImage($id) {
        $product = Product::findOrFail($id);
        return view('producteditimage', compact('product'));
    }

    public function UpdateProductImage(Request $request) {
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $product_id = $request->product_id;


        $image = $request->file('product_image');
        $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;


        Product::findOrFail($product_id)->update([
            'product_image' => $image_url,
        ]);

        return redirect()->route('allproduct')->with('message', 'Product image updated successfully!');
    }

    public function EditProduct($id) {
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('editproduct', compact('product', 'categories', 'subcategories'));
    }

    public function UpdateProduct(Request $request) {
        $product_id = $request->product_id;

        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'count' => 'required',
        ]);

        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'price' => $request->price,
            'count' => $request->count,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        return redirect()->route('allproduct')->with('message', 'Product updated successfully!');
    }

    public function DeleteProduct($id) {
        $product = Product::findOrFail($id);
        $category_id = $product->product_category_id;
        $subcategory_id = $product->product_subcategory_id;

        $product_image = $product->product_image;
        unlink($product_image);

        Product::findOrFail($id)->delete();

        Category::where('id', $category_id)->decrement('product_count',1);
        Subcategory::where('id', $subcategory_id)->decrement('subcategory_product_count',1);

        return redirect()->route('allproduct')->with('message', 'Product deleted successfully!');
    }
}

