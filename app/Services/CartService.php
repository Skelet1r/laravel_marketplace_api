<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CartService {

    public function getCart($cart) {
        $cart = CartItem::where('cart_id', $cart)->get();

        return response()->json($cart);
    }

    public function addToCart($id) {

        $product = Product::findOrFail($id);

        $user = Auth::id();

        $cart = Cart::updateOrCreate([
            'user_id' => $user
        ]);

        if ($cart->cartItems->contains('id', $id)) {
            $cartItem = $cart->cartItems()->where('id', $id)->first();
            $cartItem->increment('quantity');
        }

        else {
            $cartItem = CartItem::create([
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'discount' => $product->discount,
                'quantity' => 1,
                'image' => $product->image,
                'color' => $product->color,
                'rating' => $product->rating,
                'size' => $product->size,
                'cart_id' => $cart->id,
            ]);
        }


        return response()->json([
            'status' => 'success',
            'item' => $cartItem
        ]);
    }

    public function removeFromCart(CartItem $cartItem) {

        $cartItem->delete();

        return response()->json([
            'status' => 'success',
            'product' => $cartItem,
        ]);
    }
}
