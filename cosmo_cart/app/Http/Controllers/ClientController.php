<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Cart;
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
        return view('user_panel.single_product', compact('product', 'category', 'subcategory'));
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
}
