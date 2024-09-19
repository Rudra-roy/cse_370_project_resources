<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function PendingOrders() {
        return view('pendingorders');
    }

    public function CompletedOrders() {
        return view('completedorders');
    }

    public function CancelOrders() {
        return view('cancelorders');
    }
}
