<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id) {
        $categories = Category::latest()->get();
        $category = Category::findorFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_panel.category_page', compact('category', 'products'));
    }

    public function SingleProduct($id, $slug, $product_category_id, $product_subcategory_id) {
        $product = Product::findorFail($id);
        $category = Category::findorFail($product_category_id);
        $subcategory = SubCategory::findorFail($product_subcategory_id);

        $feedbacks = Feedback::where('product_id', $id)->with('user')->get();


        return view('user_panel.single_product', compact('product', 'category', 'subcategory', 'feedbacks'));
    }

    public function AddTocart() {
        $cart_items = Cart::where('user_id', Auth::id())->latest()->get();
        return view('user_panel.add_to_cart', compact('cart_items'));
    }

    public function AddProductTocart(Request $request) {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $quantity,
            'price' => $price,
            

        ]);
        return redirect()->route('addtocart')->with('message', 'Product added to cart successfully');
    }

    public function ShippingAddress() {
        return view('user_panel.shippingaddress');
    }

    public function RemoveCartItem($id) {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Product removed from cart successfully');
    }

    public function CheckOut() {
        return view('user_panel.check_out');
    }

    public function UserProfile() {
        return view('user_panel.user_profile');
    }

    public function NewRelease() {
        return view('user_panel.new_release');
    }

    public function TodaysDeal() {
        return view('user_panel.todays_deal');
    }

    public function CustomerService() {
        return view('user_panel.customer_service');
    }

    public function PendingOrders() {
        return view('user_panel.pending_orders');
    }

    public function OrderHistory() {
        return view('user_panel.order_history');
    }

    public function RateProduct(Request $request, $id) {
        $product = Product::findorFail($id);

        $previous_rating = $product->rating;
        $new_rating = $previous_rating + $request->rating;
        $current_number_of_ratings = $product->number_of_rating + 1;
        $new_average_rating = $new_rating / $current_number_of_ratings;

        $product->rating = $new_average_rating;
        $product->number_of_rating = $current_number_of_ratings;
        $product->save();

        return redirect()->route('singleproduct', [$product->id, $product->slug, $product->product_category_id, $product->product_subcategory_id])->with('message', 'Product rated successfully');
    }

    public function submitFeedBack(Request $request, $id) {
        $product = Product::findorFail($id);
        $request->validate([
            'content' => 'required | string |max:1000',
        ]);

        Feedback::insert([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'content' => $request->content,
        ]);

        return redirect()->route('singleproduct', [$product->id, $product->slug, $product->product_category_id, $product->product_subcategory_id])->with('message', 'Feedback submitted successfully');
    }

    public function CategorySort(Request $request, $id){
        $category = Category::findorFail($id);

        $sort_by = $request->input('sort_by');

        $products = Product::where('product_category_id', $id);

        switch ($sort_by) {
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'rating_asc':
                $products = $products->orderBy('rating', 'asc');
                break;
            case 'rating_desc':
                $products = $products->orderBy('rating', 'desc');
                break;
        }

        $products = $products->get();


        return view('user_panel.category_page', compact('category', 'products'));
    }


}
