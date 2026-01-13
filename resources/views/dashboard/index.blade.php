@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-3xl shadow-xl p-8 mb-8">
            <h1 class="text-4xl font-serif font-bold text-primary-dark mb-6">Welcome, {{ Auth::user()->name }}!</h1>
            
            @if(Auth::user()->isAdmin() || Auth::user()->isOrderProcessor())
            <div class="mb-6">
                <a href="{{ route('admin.index') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-semibold">
                    Admin Panel
                </a>
            </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <a href="{{ route('dashboard.orders') }}" class="bg-gradient-to-br from-red-600 to-red-700 text-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">My Orders</h3>
                            <p class="text-white/90">View order status</p>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('cart') }}" class="bg-gradient-to-br from-orange-600 to-orange-700 text-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Shopping Cart</h3>
                            <p class="text-white/90">Continue shopping</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <!-- Recent Orders -->
        <div class="bg-white rounded-3xl shadow-xl p-8">
            <h2 class="text-2xl font-serif font-bold text-primary-dark mb-6">Recent Orders</h2>
            
            @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders->take(5) as $order)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-bold text-lg text-primary-dark">{{ $order->order_number }}</h3>
                            <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y H:i') }}</p>
                            <p class="text-sm text-gray-600">Total: ₱{{ number_format($order->total, 2) }}</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold
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
                </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('dashboard.orders') }}" class="text-red-600 hover:text-red-700 font-semibold">
                    View All Orders →
                </a>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-600 mb-4">No orders yet</p>
                <a href="{{ route('bento.builder') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-semibold">
                    Start Shopping
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
