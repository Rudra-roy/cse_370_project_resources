<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function AllSubCategory() {
        $allsubcategories = Subcategory::latest()->get();
        return view('allsubcategory', compact('allsubcategories'));
    }

    public function AddSubCategory() {
        $categories = Category::latest()->get();
        return view('addsubcategory', compact('categories'));
    }

    public function StoreSubCategory(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories',
        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');



        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_name' => $category_name
        ]);

        Category::where('id', $category_id)->increment('subcategory_count',1);

        return redirect()->route('allsubcategory')->with('message', 'Subcategory added successfully');
    }

    public function EditSubCategory($id) {
        $subcategory = Subcategory::findOrFail($id);
        return view('editsubcategory', compact('subcategory'));
    }

    public function UpdateSubCategory(Request $request) {


        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);

        $subcategory_id = $request->subcategory_id;


        Subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        return redirect()->route('allsubcategory')->with('message', 'Subcategory updated successfully!');
    }

    public function DeleteSubCategory($id) {
        $category_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrFail($id)->delete();

        Category::where('id', $category_id)->decrement('subcategory_count',1);


        return redirect()->route('allsubcategory')->with('message', 'Subcategory deleted successfully!');
    }
}
