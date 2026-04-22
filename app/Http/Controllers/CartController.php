<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $cart = session() ->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function add(Product $product){
        $cart = session()->get('cart', []);

        if(isset($cart[$product->p_id])){
            $cart[$product->p_id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session() -> put('cart', $cart);

        return Redirect('/cart');
    }

    public function update(Request $request, $id){
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return back();
    }

    public function remove(Product $product){
        $cart = session() -> get('cart');
        unset($cart[$product->p_id]);

        session()->put('cart', $cart);

        return back();
    }
}
