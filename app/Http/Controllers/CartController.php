<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Return cart items from session (if any)
        $items = session('cart_items', []);
        
        return response()->json([
            'items' => $items,
            'count' => count($items)
        ]);
    }
    
    public function store(Request $request)
    {
        // Save cart items to session
        $items = $request->input('items', []);
        session(['cart_items' => $items]);
        
        return response()->json([
            'success' => true,
            'message' => 'Cart saved',
            'items' => $items
        ]);
    }
}
