<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        return view('orders', [
            'orders' => Order::latest()->get()
        ]);
    }

    public function store(Request $request){
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function($item){
            return $item['price'] * $item['quantity'];
        });

        Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'items' => json_encode($cart),
            'total' => $total
        ]);

        session() ->forget('cart');

        return redirect('/orders');
    }
}
