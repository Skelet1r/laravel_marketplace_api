<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    protected CartService $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function getCart($cart) {
        return $this->cartService->getCart($cart);
    }
    public function addToCart($id) {
        return $this->cartService->addToCart($id);
    }

    public function removeFromCart(CartItem $cartItem) {
        return $this->cartService->removeFromCart($cartItem);
    }
}
