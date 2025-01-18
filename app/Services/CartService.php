<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CartService {

    public function getCart() {
        $carts = Cart::where('user_id', Auth::id())->get();

        return response()->json($carts);
    }
    public function addToCart(Request $request, $product) {

        $product = Product::query()->findOrFail($product);

        $user_id = Auth::id();

        $cart = Cart::firstOrCreate([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'discount' => $product->discount,
            'quantity' => $product->quantity,
            'image' => $product->image,
            'color' => $product->color,
            'rating' => $product->rating,
            'size' => $product->size,
            'user_id' => $user_id,
        ]);

        return response()->json([
            'status' => 'success',
            'cart' => $cart,
        ]);
    }

    public function removeFromCart(Cart $cart) {

        $cart->delete();

        return response()->json([
            'status' => 'success',
            'product' => $cart,
        ]);
    }
}
