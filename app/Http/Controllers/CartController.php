<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    protected CartService $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function getCart() {
        return $this->cartService->getCart();
    }
    public function addToCart(Request $request, $product) {
        return $this->cartService->addToCart($request, $product);
    }

    public function removeFromCart(Cart $cart) {
        return $this->cartService->removeFromCart($cart);
    }
}
