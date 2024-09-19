<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory() {
        $categories = Category::latest()->get();
        return view('allcategory', compact('categories'));
    }

    public function AddCategory() {
        return view('addcategory');
    }

    public function StoreCategory(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        return redirect()->route('allcategory')->with('message', 'Category added successfully');
    }

    public function EditCategory($id) {
        $category = Category::findOrFail($id);
        return view('editcategory', compact('category'));
    }

    public function UpdateCategory(Request $request) {

        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        return redirect()->route('allcategory')->with('message', 'Category updated successfully!');
    }

    public function DeleteCategory($id) {
        Category::findOrFail($id)->delete();


        return redirect()->route('allcategory')->with('message', 'Category deleted successfully!');
    }
}
