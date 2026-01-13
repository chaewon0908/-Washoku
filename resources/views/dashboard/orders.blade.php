@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-3xl shadow-xl p-8 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-serif font-bold text-primary-dark">My Orders</h1>
                <a href="{{ route('dashboard') }}" class="text-red-600 hover:text-red-700 font-semibold">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
        
        <div class="bg-white rounded-3xl shadow-xl p-8">
            @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="border-2 border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-primary-dark mb-2">{{ $order->order_number }}</h3>
                            <p class="text-gray-600">Placed on {{ $order->created_at->format('F d, Y \a\t g:i A') }}</p>
                        </div>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status === 'confirmed') bg-blue-100 text-blue-800
                            @elseif($order->status === 'preparing') bg-purple-100 text-purple-800
                            @elseif($order->status === 'delivering') bg-indigo-100 text-indigo-800
                            @elseif($order->status === 'completed') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">GCash Number</p>
                            <p class="font-semibold">{{ $order->gcash_number }}</p>
                        </div>
                        @if($order->delivery_address)
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Delivery Address</p>
                            <p class="font-semibold">{{ $order->delivery_address }}</p>
                        </div>
                        @endif
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4 mb-4">
                        <h4 class="font-semibold text-primary-dark mb-2">Order Items:</h4>
                        <div class="space-y-2">
                            @foreach($order->items as $item)
                            <div class="flex justify-between items-center">
                                <span>{{ $item->item_name }} x {{ $item->quantity }}</span>
                                <span class="font-semibold">₱{{ number_format($item->item_price * $item->quantity, 2) }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold">Total:</span>
                            <span class="text-2xl font-bold text-red-600">₱{{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📦</div>
                <p class="text-gray-600 text-lg mb-6">You haven't placed any orders yet</p>
                <a href="{{ route('bento.builder') }}" class="inline-block bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700 transition-colors font-semibold">
                    Start Shopping
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
