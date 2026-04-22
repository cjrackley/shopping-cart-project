<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;

class OrderController extends Controller
{
    public function index() {
        return view('orders.index', [
            'orders' => Order::latest()->get()
        ]);
    }

    public function store(Request $request){
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect('/cart');
        }

        $total = collect($cart)->sum(function($item){
            return $item['price'] * $item['quantity'];
        });

        $order = Order::create([
            'date' => now(),
            'status' => 'pending',
            'total_amount' => $total
        ]);

        foreach($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'p_id' => $id,
                'quantity' => $item['quantity'],
                'unit_price' => $item['price']
            ]);
        }

        Shipping::create([
            'order_id' => $order->id,
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'address' => $request->address,
            'zip_code' => $request->zip_code
        ]);

        session() ->forget('cart');

        return redirect('/orders');
    }
}
