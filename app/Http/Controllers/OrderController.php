<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $barangID = $request->input('barangID');
        $userID = $request->input('userID');
        $order = new Order();
        $order->barangID = $barangID;
        $order->userID = $userID;
        if ($order->save()) {
            return redirect('/')->with('success', 'Barang ditambahkan ke keranjang');
        }
    }
}
