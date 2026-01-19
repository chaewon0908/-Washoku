@extends('layouts.app')

@section('title', 'Admin Panel - Washoku')

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
        <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3">Management</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif">
            Admin <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Panel</span>
        </h1>
        <p class="text-white/60 text-lg">Manage your restaurant operations</p>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden min-h-screen">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
            <!-- Total Orders -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 group-hover:text-white/70 text-sm mb-1 transition-colors">Total Orders</p>
                        <p class="text-3xl font-bold text-gray-800 group-hover:text-white transition-colors">{{ $stats['total_orders'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-50 group-hover:from-red-600 group-hover:to-red-700 rounded-xl flex items-center justify-center transition-all">
                        <svg class="w-7 h-7 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-amber-500 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>

            <!-- Pending Orders -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:border-amber-200 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 group-hover:text-white/70 text-sm mb-1 transition-colors">Pending Orders</p>
                        <p class="text-3xl font-bold text-amber-600 group-hover:text-amber-400 transition-colors">{{ $stats['pending_orders'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-100 to-amber-50 group-hover:from-amber-500 group-hover:to-amber-600 rounded-xl flex items-center justify-center transition-all">
                        <svg class="w-7 h-7 text-amber-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 via-red-500 to-amber-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>

            <!-- Completed Orders -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:border-green-200 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 group-hover:text-white/70 text-sm mb-1 transition-colors">Completed</p>
                        <p class="text-3xl font-bold text-green-600 group-hover:text-green-400 transition-colors">{{ $stats['completed_orders'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-50 group-hover:from-green-600 group-hover:to-green-700 rounded-xl flex items-center justify-center transition-all">
                        <svg class="w-7 h-7 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 via-amber-500 to-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>

            <!-- Total Revenue -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 group-hover:text-white/70 text-sm mb-1 transition-colors">Total Revenue</p>
                        <p class="text-3xl font-bold text-gray-800 group-hover:text-amber-400 transition-colors">₱{{ number_format($stats['total_revenue'], 2) }}</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-amber-50 group-hover:from-amber-500 group-hover:to-red-600 rounded-xl flex items-center justify-center transition-all">
                        <svg class="w-7 h-7 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-amber-500 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>

            <!-- Menu Items -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:border-purple-200 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 group-hover:text-white/70 text-sm mb-1 transition-colors">Menu Items</p>
                        <p class="text-3xl font-bold text-gray-800 group-hover:text-white transition-colors">{{ $stats['total_menu_items'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-50 group-hover:from-purple-600 group-hover:to-purple-700 rounded-xl flex items-center justify-center transition-all">
                        <svg class="w-7 h-7 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 via-amber-500 to-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>

            <!-- Categories -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 group-hover:text-white/70 text-sm mb-1 transition-colors">Categories</p>
                        <p class="text-3xl font-bold text-gray-800 group-hover:text-white transition-colors">{{ $stats['total_categories'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-100 to-indigo-50 group-hover:from-indigo-600 group-hover:to-indigo-700 rounded-xl flex items-center justify-center transition-all">
                        <svg class="w-7 h-7 text-indigo-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 via-amber-500 to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 mb-10">
            <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800">Quick Actions</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.orders') }}" class="group relative bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] text-white p-5 rounded-xl shadow-lg hover:shadow-2xl transition-all hover:scale-[1.02] overflow-hidden">
                        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-red-500/50 to-transparent"></div>
                        <div class="relative z-10 flex items-center gap-4">
                            <div class="w-12 h-12 bg-red-600/20 rounded-xl flex items-center justify-center group-hover:bg-red-600 transition-colors">
                                <svg class="w-6 h-6 text-red-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">Manage Orders</h3>
                                <p class="text-white/60 text-sm">View & update status</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.orders.completed') }}" class="group relative bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] text-white p-5 rounded-xl shadow-lg hover:shadow-2xl transition-all hover:scale-[1.02] overflow-hidden">
                        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-green-500/50 to-transparent"></div>
                        <div class="relative z-10 flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-600/20 rounded-xl flex items-center justify-center group-hover:bg-green-600 transition-colors">
                                <svg class="w-6 h-6 text-green-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">Completed Orders</h3>
                                <p class="text-white/60 text-sm">View order history</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.menu-items.index') }}" class="group relative bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] text-white p-5 rounded-xl shadow-lg hover:shadow-2xl transition-all hover:scale-[1.02] overflow-hidden">
                        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-purple-500/50 to-transparent"></div>
                        <div class="relative z-10 flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-600/20 rounded-xl flex items-center justify-center group-hover:bg-purple-600 transition-colors">
                                <svg class="w-6 h-6 text-purple-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">Manage Menu</h3>
                                <p class="text-white/60 text-sm">Create & edit items</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('menu.index') }}" class="group relative bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] text-white p-5 rounded-xl shadow-lg hover:shadow-2xl transition-all hover:scale-[1.02] overflow-hidden">
                        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-500/50 to-transparent"></div>
                        <div class="relative z-10 flex items-center gap-4">
                            <div class="w-12 h-12 bg-amber-600/20 rounded-xl flex items-center justify-center group-hover:bg-amber-600 transition-colors">
                                <svg class="w-6 h-6 text-amber-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">View Menu</h3>
                                <p class="text-white/60 text-sm">Browse all items</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">Recent Orders</h2>
                <a href="{{ route('admin.orders') }}" class="text-red-600 hover:text-red-700 font-semibold text-sm flex items-center gap-1">
                    View All
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            
            @if($recentOrders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="text-left py-3 px-6 font-semibold text-gray-600 text-sm">Order #</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-600 text-sm">Customer</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-600 text-sm">Date</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-600 text-sm">Total</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-600 text-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($recentOrders as $order)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <a href="{{ route('admin.orders') }}?order={{ $order->order_number }}" class="text-red-600 hover:text-red-700 font-semibold">
                                    {{ $order->order_number }}
                                </a>
                            </td>
                            <td class="py-4 px-6 text-gray-700">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="py-4 px-6 text-gray-500 text-sm">{{ $order->created_at->format('M d, Y H:i') }}</td>
                            <td class="py-4 px-6 font-bold text-gray-800">₱{{ number_format($order->total, 2) }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <p class="text-gray-500">No orders yet</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
