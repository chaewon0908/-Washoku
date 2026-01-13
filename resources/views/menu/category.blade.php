@extends('layouts.app')

@section('title', $category->name . ' - Washoku')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-red-600 transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('menu.index') }}" class="hover:text-red-600 transition-colors">Menu</a>
                <span>/</span>
                <span class="text-primary-dark font-semibold">{{ $category->name }}</span>
            </nav>
        </div>

        <!-- Category Header -->
        <div class="text-center mb-12">
            <div class="inline-block bg-gradient-to-br from-red-100 to-red-50 rounded-full p-6 mb-6">
                <div class="text-6xl">🍱</div>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-4 text-primary-dark font-serif">{{ $category->name }}</h1>
            @if($category->description)
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">{{ $category->description }}</p>
            @endif
        </div>

        <!-- Category Tabs and Menu Items Grid for Bento Boxes -->
        @if($category->slug === 'bento-boxes')
        <div x-data="{ 
            activeTab: 'all',
            filterItems(item) {
                if (this.activeTab === 'all') return true;
                if (this.activeTab === 'featured') return item.is_featured === true;
                if (this.activeTab === 'traditional') {
                    const name = item.name.toLowerCase();
                    return name.includes('traditional') || name.includes('makunouchi') || 
                           name.includes('tonkatsu') || name.includes('teriyaki') || 
                           name.includes('sukiyaki') || name.includes('salmon teriyaki');
                }
                if (this.activeTab === 'character') {
                    const name = item.name.toLowerCase();
                    return name.includes('character') || name.includes('decorative') || 
                           name.includes('kyaraben') || name.includes('kyara');
                }
                return true;
            }
        }">
            <!-- Category Tabs -->
            <div class="mb-8">
                <div class="flex flex-wrap justify-center gap-3 mb-8">
                    <button 
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        All
                    </button>
                    <button 
                        @click="activeTab = 'featured'"
                        :class="activeTab === 'featured' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        ⭐ Featured
                    </button>
                    <button 
                        @click="activeTab = 'traditional'"
                        :class="activeTab === 'traditional' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        Traditional
                    </button>
                    <button 
                        @click="activeTab = 'character'"
                        :class="activeTab === 'character' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        Character/Decorative
                    </button>
                </div>
            </div>

            <!-- Menu Items Grid -->
            @if($items->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($items as $item)
                    <div 
                        @if($category->slug === 'bento-boxes')
                        x-show="filterItems(@js([
                            'name' => $item->name,
                            'is_featured' => $item->is_featured ?? false
                        ]))"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        @endif
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        <div class="relative overflow-hidden" style="height: 250px;">
                            <img 
                                src="{{ $item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food' }}" 
                                alt="{{ $item->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                            @if($item->is_featured)
                                <div class="absolute top-3 left-3 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                    ⭐ Featured
                                </div>
                            @endif
                            @if($item->is_bestseller)
                                <div class="absolute top-3 right-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    🔥 Bestseller
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary-dark mb-2 font-serif">{{ $item->name }}</h3>
                            @if($item->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($item->description, 80) }}</p>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-red-600">₱{{ number_format($item->price, 2) }}</span>
                                @if($category->slug === 'bento-boxes' && $item->name === 'Custom Bento Box (4 compartments)')
                                    <a href="/bento-builder"
                                       class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300 shadow-md hover:shadow-lg inline-block text-center">
                                        Customize
                                    </a>
                                @else
                                    <button 
                                        @click="$store.cart.addToCart({{ $item->id }}, '{{ addslashes($item->name) }}', {{ $item->price }}, '{{ addslashes($item->image_url ?? $item->image ?? '') }}')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300 shadow-md hover:shadow-lg">
                                        Add to Cart
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-6xl mb-4">🍽️</div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No items available</h2>
                    <p class="text-gray-600 mb-6">This category doesn't have any menu items yet.</p>
                    <a href="{{ route('menu.index') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                        Browse Other Categories
                    </a>
                </div>
            @endif
        </div>
        @else
        <!-- Menu Items Grid (Non-Bento Categories) -->
        @if($items->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($items as $item)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        <div class="relative overflow-hidden" style="height: 250px;">
                            <img 
                                src="{{ $item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food' }}" 
                                alt="{{ $item->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                            @if($item->is_featured)
                                <div class="absolute top-3 left-3 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                    ⭐ Featured
                                </div>
                            @endif
                            @if($item->is_bestseller)
                                <div class="absolute top-3 right-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    🔥 Bestseller
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary-dark mb-2 font-serif">{{ $item->name }}</h3>
                            @if($item->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($item->description, 80) }}</p>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-red-600">₱{{ number_format($item->price, 2) }}</span>
                                <button 
                                    @click="$store.cart.addToCart({{ $item->id }}, '{{ addslashes($item->name) }}', {{ $item->price }}, '{{ addslashes($item->image_url ?? $item->image ?? '') }}')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300 shadow-md hover:shadow-lg">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🍽️</div>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">No items available</h2>
                <p class="text-gray-600 mb-6">This category doesn't have any menu items yet.</p>
                <a href="{{ route('menu.index') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                    Browse Other Categories
                </a>
            </div>
        @endif
        @endif
    </div>
</div>
@endsection
