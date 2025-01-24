<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Jobs\SendEmails;

class OrderService {

    public function getCart($cartId) {
        return CartItem::where('cart_id', $cartId)->get();
    }

    public function getCartTotal($cartId) {
        return CartItem::where('cart_id', $cartId)->sum('price');
    }

    public function createOrder(Request $request, $cartId)
    {
        $user = Auth::user();

        $cartItems = $this->getCart($cartId);

        $request->validate([
            'phone' => 'required|string|min:9|max:12',
            'address' => 'required|string',
            'orderStatus' => 'required|string',
            'payment_method' => 'required|string'
        ]);

        $cartTotal = $this->getCartTotal($cartId);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Создание PaymentIntent
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $cartTotal * 100, // Сумма в копейках/центах
            'currency' => 'rub', // Валюта
            'payment_method' => $request->payment_method,
            'confirmation_method' => 'manual', // Ручное подтверждение
            'confirm' => true, // Подтверждение платежа
        ]);

        // Создание заказа
        $order = Order::create([
            'email' => $user->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $cartTotal,
            'date' => Carbon::now()->addWeek(),
            'user_id' => $user->id,
            'cart_id' => $cartId,
            'orderStatus' => $request->orderStatus,
            'payment_status' => $paymentIntent->status,
            'payment_id' => $paymentIntent->id,
        ]);

        // Добавление товаров заказа
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'name' => $cartItem->name,
                'description' => $cartItem->description,
                'price' => $cartItem->price,
                'discount' => $cartItem->discount,
                'quantity' => $cartItem->quantity,
                'image' => $cartItem->image,
                'color' => $cartItem->color,
                'rating' => $cartItem->rating,
                'size' => $cartItem->size,
                'order_id' => $order->id,
            ]);
        }

        return response()->json([
            'order' => $order,
            'orderItems' => $order->orderItems,
            'payment' => $paymentIntent, // Возвращаем PaymentIntent
        ]);
    }

    public function changeOrderStatus(Request $request, Order $order) {

        $user = Auth::user();

        $request->validate([
            'orderStatus' => 'required|string|in:delivered',
        ]);

        SendEmails::dispatch($user);

        $order->update($request->only(['orderStatus']));

        return response()->json([
            'status' => 'success',
            'order' => $order,
        ]);
    }
}
