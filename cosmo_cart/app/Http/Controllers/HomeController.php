<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home() {
        $allproducts = Product::latest()->get();
        return view('user_panel.home', compact('allproducts'));
    }
}
