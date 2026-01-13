@extends('layouts.app')

@section('title', 'Manage Orders - Admin Panel')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-serif font-bold text-primary-dark mb-2">Manage Orders</h1>
                <p class="text-gray-600">View and update order status</p>
            </div>
            <a href="{{ route('admin.index') }}" class="text-red-600 hover:text-red-700 font-semibold">
                ← Back to Admin Panel
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8">
            @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            @if($orders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Order #</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Customer</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Items</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <span class="font-semibold text-primary-dark">{{ $order->order_number }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-semibold">{{ $order->customer_name ?? ($order->user->name ?? 'Guest') }}</p>
                                    @if($order->customer_email)
                                    <p class="text-sm text-gray-600">{{ $order->customer_email }}</p>
                                    @endif
                                    @if($order->customer_phone)
                                    <p class="text-sm text-gray-600">{{ $order->customer_phone }}</p>
                                    @endif
                                    @if($order->delivery_address)
                                    <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($order->delivery_address, 30) }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="space-y-1">
                                    @foreach($order->items as $item)
                                    <p class="text-sm">
                                        {{ $item->quantity }}x {{ $item->item_name }}
                                    </p>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                {{ $order->created_at->format('M d, Y') }}<br>
                                <span class="text-xs">{{ $order->created_at->format('H:i') }}</span>
                            </td>
                            <td class="py-4 px-4 font-semibold text-lg">₱{{ number_format($order->total, 2) }}</td>
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
                            <td class="py-4 px-4">
                                <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="inline-block">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
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

            <div class="mt-6">
                {{ $orders->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg">No orders found</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
