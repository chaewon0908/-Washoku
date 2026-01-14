@extends('layouts.app')

@section('title', $category->name . ' - Washoku')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12"
     x-data="menuItemsPage()"
     x-init="init()">
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

        <!-- Category Tabs and Menu Items Grid -->
        <div x-data="{ 
            activeTab: 'all',
            filterItems(item) {
                if (this.activeTab === 'all') return true;
                if (this.activeTab === 'featured') return item.is_featured === true;
                if (this.activeTab === 'traditional') {
                    const name = item.name.toLowerCase();
                    return name.includes('traditional') || name.includes('makunouchi') || 
                           name.includes('tonkatsu') || name.includes('teriyaki') || 
                           name.includes('sukiyaki') || name.includes('salmon teriyaki') ||
                           name.includes('shoyu') || name.includes('classic');
                }
                if (this.activeTab === 'character') {
                    const name = item.name.toLowerCase();
                    return name.includes('character') || name.includes('decorative') || 
                           name.includes('kyaraben') || name.includes('kyara') ||
                           name.includes('custom') || name.includes('special');
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
                        @click="openItemModal(@js([
                            'id' => $item->id,
                            'name' => $item->name,
                            'description' => $item->description,
                            'price' => $item->price,
                            'image' => $item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food',
                            'is_featured' => $item->is_featured ?? false,
                            'is_bestseller' => $item->is_bestseller ?? false,
                            'is_custom_bento' => $item->name === 'Custom Bento Box (4 compartments)'
                        ]))"
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group cursor-pointer transform hover:-translate-y-1">
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
                            <!-- Click hint overlay -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
                                <span class="text-white font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 px-4 py-2 rounded-full">
                                    View Details
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary-dark mb-2 font-serif">{{ $item->name }}</h3>
                            @if($item->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($item->description, 80) }}</p>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-red-600">₱{{ number_format($item->price, 2) }}</span>
                                <span class="text-sm text-gray-500">Click for details</span>
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
    </div>

    <!-- Item Details Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4"
         x-on:click.self="closeModal()"
         x-on:keydown.escape.window="closeModal()">
        
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-90 translate-y-4"
             class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            
            <!-- Modal Header with Image -->
            <div class="relative">
                <div class="h-64 md:h-80 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                    <img :src="selectedItem?.image || 'https://via.placeholder.com/600x400/f3f4f6/9ca3af?text=Food'" 
                         :alt="selectedItem?.name"
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400/f3f4f6/9ca3af?text=Food';">
                </div>
                
                <!-- Close Button -->
                <button x-on:click="closeModal()" 
                        class="absolute top-4 right-4 bg-white/90 hover:bg-white text-gray-700 hover:text-red-600 w-10 h-10 rounded-full flex items-center justify-center transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex gap-2">
                    <template x-if="selectedItem?.is_featured">
                        <span class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            ⭐ Featured
                        </span>
                    </template>
                    <template x-if="selectedItem?.is_bestseller">
                        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            🔥 Bestseller
                        </span>
                    </template>
                </div>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6 md:p-8 overflow-y-auto max-h-[calc(90vh-320px)]">
                <!-- Item Name -->
                <h2 class="text-3xl md:text-4xl font-bold text-primary-dark mb-4 font-serif" x-text="selectedItem?.name"></h2>
                
                <!-- Price -->
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl font-bold text-red-600" x-text="'₱' + (selectedItem?.price ? Number(selectedItem.price).toFixed(2) : '0.00')"></span>
                    <span class="text-gray-500 text-sm bg-gray-100 px-3 py-1 rounded-full">per serving</span>
                </div>
                
                <!-- Full Description -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Description
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-base" x-text="selectedItem?.description || 'A delicious Japanese dish prepared with the finest ingredients and traditional cooking methods.'"></p>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <template x-if="selectedItem?.is_custom_bento">
                        <a href="/bento-builder"
                           class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            Customize Your Bento
                        </a>
                    </template>
                    <template x-if="!selectedItem?.is_custom_bento">
                        <button 
                            @click="addToCartFromModal()"
                            class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Add to Cart
                        </button>
                    </template>
                    <button 
                        @click="closeModal()"
                        class="sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-2xl font-semibold transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Continue Browsing
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function menuItemsPage() {
    return {
        showModal: false,
        selectedItem: null,
        
        init() {
            console.log('Menu items page initialized');
        },
        
        openItemModal(item) {
            console.log('Opening modal for item:', item);
            this.selectedItem = item;
            this.showModal = true;
            // Prevent body scroll when modal is open
            document.body.style.overflow = 'hidden';
        },
        
        closeModal() {
            this.showModal = false;
            // Re-enable body scroll
            document.body.style.overflow = '';
            setTimeout(() => {
                this.selectedItem = null;
            }, 300);
        },
        
        addToCartFromModal() {
            if (!this.selectedItem) return;
            
            const item = this.selectedItem;
            
            // Use Alpine store to add to cart
            if (window.Alpine && window.Alpine.store('cart')) {
                window.Alpine.store('cart').addToCart(
                    item.id,
                    item.name,
                    item.price,
                    item.image
                );
            } else {
                // Fallback: direct localStorage manipulation
                const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
                const userId = document.querySelector('meta[name="user-id"]')?.content;
                const cartKey = authCheck === 'true' && userId ? `cart_user_${userId}` : 'cart_guest';
                
                const existingCart = JSON.parse(localStorage.getItem(cartKey) || '{"items":[],"count":0}');
                
                // Check if item already exists
                const existingIndex = existingCart.items.findIndex(i => i.id === item.id);
                if (existingIndex !== -1) {
                    existingCart.items[existingIndex].quantity = (existingCart.items[existingIndex].quantity || 1) + 1;
                } else {
                    existingCart.items.push({
                        id: item.id,
                        name: item.name,
                        price: item.price,
                        image: item.image,
                        quantity: 1
                    });
                }
                
                existingCart.count = existingCart.items.reduce((sum, i) => sum + (i.quantity || 1), 0);
                localStorage.setItem(cartKey, JSON.stringify(existingCart));
                
                // Dispatch event to update cart
                window.dispatchEvent(new CustomEvent('cart-updated'));
            }
            
            // Close modal after adding
            this.closeModal();
            
            // Show success feedback (you could also use a toast notification here)
            alert('Added to cart: ' + item.name);
        }
    }
}
</script>
@endsection
