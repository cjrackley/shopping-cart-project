<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $cart = session() ->get('card', []);

        return view('cart', compact('cart'));
    }

    public function add(Product $product){
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quntity" => 1
            ];
        }

        session() -> put('cart', $cart);

        return Redirect('/cart');
    }

    public function update(Request $request, Product $product){
        $cart = session()->get('cart');

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return back();
    }

    public function remove(Product $product){
        $cart = session() -> get('cart');
        unset($cart[$product->id]);

        session()->put('cart', $cart);

        return back();
    }
}
