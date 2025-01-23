<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    public function createOrder(Request $request, $cart) {
        return $this->orderService->createOrder($request, $cart);
    }

    public function changeOrderStatus(Request $request, Order $order) {
        return $this->orderService->changeOrderStatus($request, $order);
    }
}
