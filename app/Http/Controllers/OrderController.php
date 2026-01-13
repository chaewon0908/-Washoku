<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'gcash_number' => 'required|string',
            'delivery_address' => 'nullable|string',
            'customer_phone' => 'nullable|string',
        ]);
        
        // Get cart items from the cart store (sent from frontend)
        // The frontend sends cart items in the request body
        $cartItems = $request->input('items', []);
        
        // Try to get from session if not in request
        if (empty($cartItems)) {
            $cartItems = session('cart_items', []);
        }
        
        if (empty($cartItems)) {
            return response()->json([
                'success' => false,
                'error' => 'Cart is empty. Please add items to your cart first.'
            ], 400);
        }
        
        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
        }
        
        // Get customer information
        $customerName = Auth::check() ? Auth::user()->name : ($request->customer_name ?? 'Guest');
        $customerEmail = Auth::check() ? Auth::user()->email : ($request->customer_email ?? null);
        
        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'customer_name' => $customerName,
            'customer_email' => $customerEmail,
            'gcash_number' => $request->gcash_number,
            'delivery_address' => $request->delivery_address,
            'customer_phone' => $request->customer_phone,
            'subtotal' => $total,
            'delivery_fee' => 0.00,
            'total' => $total,
            'status' => 'pending',
        ]);
        
        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_name' => $item['name'] ?? 'Unknown Item',
                'item_price' => $item['price'] ?? 0,
                'quantity' => $item['quantity'] ?? 1,
            ]);
        }
        
        // Clear cart from session
        session()->forget('cart_items');
        
        return response()->json([
            'success' => true,
            'order' => [
                'id' => $order->id,
                'order_number' => $order->order_number,
                'total' => $order->total,
            ]
        ]);
    }
}
