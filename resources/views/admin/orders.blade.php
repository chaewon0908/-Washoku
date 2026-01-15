@extends('layouts.app')

@section('title', 'Manage Orders - Admin Panel')

@section('content')

<!-- Hero Section - Dark Theme -->
<section class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-12 overflow-hidden">
    <!-- Seigaiha Pattern -->
    <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
    
    <!-- Decorative Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
    
    <!-- Gold Accent Lines -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3">Admin Panel</p>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif">
                    Manage <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Orders</span>
                </h1>
                <p class="text-white/60 text-lg">View and update order status</p>
            </div>
            <a href="{{ route('admin.index') }}" class="hidden md:flex items-center gap-2 text-white/70 hover:text-amber-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Admin Panel
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden min-h-screen">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            @if(session('success'))
            <div class="m-6 mb-0 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if($orders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Order #</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Customer</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Items</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Date</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Total</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Status</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($orders as $order)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <span class="font-bold text-gray-800">{{ $order->order_number }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $order->customer_name ?? ($order->user->name ?? 'Guest') }}</p>
                                    @if($order->customer_email)
                                    <p class="text-xs text-gray-500">{{ $order->customer_email }}</p>
                                    @endif
                                    @if($order->customer_phone)
                                    <p class="text-xs text-gray-500">{{ $order->customer_phone }}</p>
                                    @endif
                                    @if($order->delivery_address)
                                    <p class="text-xs text-gray-500 mt-1">{{ \Illuminate\Support\Str::limit($order->delivery_address, 30) }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1 max-w-[200px]">
                                    @foreach($order->items as $item)
                                    <p class="text-sm text-gray-600">
                                        <span class="font-medium text-gray-800">{{ $item->quantity }}x</span> {{ $item->item_name }}
                                    </p>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</p>
                                <p class="text-xs text-gray-400">{{ $order->created_at->format('H:i') }}</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-lg font-bold text-red-600">₱{{ number_format($order->total, 2) }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 rounded-full text-xs font-semibold
                                    @if($order->status === 'pending') bg-amber-100 text-amber-700
                                    @elseif($order->status === 'confirmed') bg-blue-100 text-blue-700
                                    @elseif($order->status === 'preparing') bg-purple-100 text-purple-700
                                    @elseif($order->status === 'delivering') bg-indigo-100 text-indigo-700
                                    @elseif($order->status === 'completed') bg-green-100 text-green-700
                                    @else bg-red-100 text-red-700
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="inline-block">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="px-3 py-2 text-sm border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white cursor-pointer">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                                        <option value="delivering" {{ $order->status === 'delivering' ? 'selected' : '' }}>Delivering</option>
                                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                {{ $orders->links() }}
            </div>
            @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg">No orders found</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
