@extends('layouts.app')

@section('title', 'Admin Panel - Washoku')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-4xl font-serif font-bold text-primary-dark mb-2">Admin Panel</h1>
            <p class="text-gray-600">Manage your restaurant operations</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Total Orders</p>
                        <p class="text-3xl font-bold text-primary-dark">{{ $stats['total_orders'] }}</p>
                    </div>
                    <div class="bg-red-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Pending Orders</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending_orders'] }}</p>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Completed Orders</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['completed_orders'] }}</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Total Revenue</p>
                        <p class="text-3xl font-bold text-primary-dark">₱{{ number_format($stats['total_revenue'], 2) }}</p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Menu Items</p>
                        <p class="text-3xl font-bold text-primary-dark">{{ $stats['total_menu_items'] }}</p>
                    </div>
                    <div class="bg-purple-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Categories</p>
                        <p class="text-3xl font-bold text-primary-dark">{{ $stats['total_categories'] }}</p>
                    </div>
                    <div class="bg-indigo-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-3xl shadow-xl p-8 mb-8">
            <h2 class="text-2xl font-serif font-bold text-primary-dark mb-6">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.orders') }}" class="bg-gradient-to-br from-red-600 to-red-700 text-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Manage Orders</h3>
                            <p class="text-white/90 text-sm">View and update order status</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.menu-items.index') }}" class="bg-gradient-to-br from-purple-600 to-purple-700 text-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Manage Menu</h3>
                            <p class="text-white/90 text-sm">Create and edit menu items</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('menu.index') }}" class="bg-gradient-to-br from-orange-600 to-orange-700 text-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">View Menu</h3>
                            <p class="text-white/90 text-sm">Browse menu items</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard') }}" class="bg-gradient-to-br from-blue-600 to-blue-700 text-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">User Dashboard</h3>
                            <p class="text-white/90 text-sm">Go to your dashboard</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-3xl shadow-xl p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-serif font-bold text-primary-dark">Recent Orders</h2>
                <a href="{{ route('admin.orders') }}" class="text-red-600 hover:text-red-700 font-semibold">
                    View All →
                </a>
            </div>
            
            @if($recentOrders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Order #</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Customer</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <a href="{{ route('admin.orders') }}?order={{ $order->order_number }}" class="text-red-600 hover:text-red-700 font-semibold">
                                    {{ $order->order_number }}
                                </a>
                            </td>
                            <td class="py-4 px-4">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="py-4 px-4 text-gray-600">{{ $order->created_at->format('M d, Y H:i') }}</td>
                            <td class="py-4 px-4 font-semibold">₱{{ number_format($order->total, 2) }}</td>
                            <td class="py-4 px-4">
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-600">No orders yet</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
