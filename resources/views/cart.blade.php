@extends('layouts.app')

@section('title', 'Shopping Cart')

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
        <div class="text-center">
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3 reveal-scale">Your Selection</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-display reveal">
                Shopping <span class="gradient-text-animate">Cart</span>
            </h1>
        </div>
    </div>
</section>

<!-- Cart Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden min-h-[60vh]">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto" x-data="cartPage()" x-init="loadCart()">
            
            <!-- Empty Cart -->
            <div x-show="$store.cart.items.length === 0" class="text-center py-16">
                <div class="bg-white rounded-2xl shadow-xl p-12 border border-gray-100">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-100 to-amber-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Your cart is empty</h2>
                    <p class="text-gray-500 mb-8">Looks like you haven't added any items yet</p>
                    <a href="/menu" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:scale-[1.02]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Browse Menu
                    </a>
                </div>
            </div>
            
            <!-- Cart Items -->
            <div x-show="$store.cart.items.length > 0">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <!-- Cart Header -->
                    <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-bold text-gray-800">Cart Items</h2>
                            <span class="text-sm text-gray-500" x-text="$store.cart.items.length + ' item(s)'"></span>
                        </div>
                    </div>
                    
                    <!-- Items List -->
                    <div class="divide-y divide-gray-100">
                        <template x-for="item in $store.cart.items" :key="item.id">
                            <div class="p-6 flex items-center gap-4 hover:bg-gray-50/50 transition-colors">
                                <!-- Item Image -->
                                <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 border-2 border-gray-100">
                                    <img :src="item.image || 'https://via.placeholder.com/200x200/f3f4f6/9ca3af?text=Food'" 
                                         :alt="item.name" 
                                         class="w-full h-full object-cover"
                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/200x200/f3f4f6/9ca3af?text=Food';">
                                </div>
                                
                                <!-- Item Details -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-gray-800 mb-1" x-text="item.name"></h3>
                                    <p class="text-gray-500 text-sm">₱<span x-text="(item.price || 0).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></span> each</p>
                                    
                                    <!-- Quantity Controls -->
                                    <div class="flex items-center gap-2 mt-3">
                                        <button 
                                            @click="if((item.quantity || 1) > 1) { $store.cart.updateQuantity(item.id, (item.quantity || 1) - 1); }"
                                            class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                            :disabled="(item.quantity || 1) <= 1">
                                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                            </svg>
                                        </button>
                                        <span class="text-gray-800 font-bold w-10 text-center" x-text="item.quantity || 1"></span>
                                        <button 
                                            @click="$store.cart.updateQuantity(item.id, (item.quantity || 1) + 1)"
                                            class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors">
                                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Price & Remove -->
                                <div class="text-right flex-shrink-0">
                                    <p class="text-xl font-bold text-red-600" x-text="'₱' + (item.price * (item.quantity || 1)).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></p>
                                    <button @click="$store.cart.remove(item.id)" class="text-red-500 text-sm hover:text-red-700 hover:underline mt-2 transition-colors">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                    <!-- Cart Footer -->
                    <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-6 border-t border-gray-100">
                        <!-- Total -->
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-lg font-bold text-gray-800">Total:</span>
                            <span class="text-3xl font-bold text-red-600" x-text="'₱' + total.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></span>
                        </div>
                        
                        <!-- Checkout Button -->
                        @if(auth()->guard()->check())
                        <button @click="showCheckout = true" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white py-4 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:scale-[1.01] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                            Proceed to Checkout
                        </button>
                        @else
                        <a href="{{ route('login') }}" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white py-4 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:scale-[1.01] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Login to Checkout
                        </a>
                        @endif
                    </div>
                </div>
                
                <!-- Continue Shopping -->
                <div class="text-center mt-6">
                    <a href="/menu" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 transition-colors group">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Continue Shopping</span>
                    </a>
                </div>
            </div>
            
            <!-- Checkout Modal -->
            <div x-show="showCheckout" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
                 @click.self="showCheckout = false"
                 @keydown.escape.window="showCheckout = false"
                 style="display: none;">
                
                <div x-show="showCheckout"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-90"
                     class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden">
                    
                    <!-- Modal Header - Dark Theme -->
                    <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] px-6 py-6 overflow-hidden">
                        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
                        
                        <div class="relative z-10 flex items-center justify-between">
                            <div>
                                <p class="text-amber-400/80 text-xs font-medium tracking-widest uppercase mb-1">Complete Order</p>
                                <h2 class="text-2xl font-bold text-white">Checkout</h2>
                            </div>
                            <button @click="showCheckout = false" class="text-white/70 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-full">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="p-6">
                        <form @submit.prevent="checkout()" class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">GCash Number *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           x-model="checkoutForm.gcash_number"
                                           required
                                           class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all outline-none"
                                           placeholder="09XX XXX XXXX">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Delivery Address (Optional)</label>
                                <div class="relative">
                                    <div class="absolute top-3 left-4 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <textarea x-model="checkoutForm.delivery_address"
                                              class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all outline-none resize-none"
                                              rows="2"
                                              placeholder="Enter your delivery address"></textarea>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number (Optional)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           x-model="checkoutForm.customer_phone"
                                           class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all outline-none"
                                           placeholder="09XX XXX XXXX">
                                </div>
                            </div>
                            
                            <!-- Order Summary -->
                            <div class="bg-gray-50 rounded-xl p-4">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold text-gray-700">Order Total</span>
                                    <span class="text-xl font-bold text-red-600" x-text="'₱' + total.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></span>
                                </div>
                            </div>
                            
                            <div class="flex gap-3 pt-2">
                                <button type="button" 
                                        @click="showCheckout = false"
                                        class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl hover:bg-gray-50 transition-colors font-semibold text-gray-700">
                                    Cancel
                                </button>
                                <button type="submit" 
                                        :disabled="checkingOut"
                                        class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl font-bold transition-all disabled:opacity-50 shadow-lg">
                                    <span x-show="!checkingOut">Place Order</span>
                                    <span x-show="checkingOut" class="flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Processing...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function cartPage() {
    return {
        showCheckout: false,
        checkingOut: false,
        checkoutForm: {
            gcash_number: '',
            delivery_address: '',
            customer_phone: ''
        },
        
        async loadCart() {
            try {
                if (window.Alpine && typeof window.Alpine.store === 'function') {
                    const cartStore = window.Alpine.store('cart');
                    if (cartStore) {
                        if (typeof cartStore.loadFromStorage === 'function') {
                            cartStore.loadFromStorage();
                        }
                        if (typeof cartStore.loadFromServer === 'function') {
                            await cartStore.loadFromServer();
                        }
                    }
                }
            } catch (e) {
                console.error('Error loading cart:', e);
            }
        },
        
        get total() {
            return this.$store.cart.items.reduce((sum, item) => {
                return sum + ((item.price || 0) * (item.quantity || 1));
            }, 0);
        },
        
        async checkout() {
            if (!this.checkoutForm.gcash_number) {
                alert('Please enter your GCash number');
                return;
            }
            
            this.checkingOut = true;
            
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
                if (!csrfToken) {
                    throw new Error('CSRF token not found. Please refresh the page.');
                }
                
                const response = await fetch('/api/orders/checkout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({
                        ...this.checkoutForm,
                        items: this.$store.cart.items
                    })
                });
                
                let data;
                try {
                    data = await response.json();
                } catch (e) {
                    throw new Error('Invalid response from server');
                }
                
                if (!response.ok || !data.success) {
                    const errorMsg = data.error || data.message || 'Failed to place order';
                    throw new Error(errorMsg);
                }
                
                alert('Order placed successfully! Order Number: ' + data.order.order_number);
                await this.$store.cart.clear();
                this.showCheckout = false;
                window.location.href = '/dashboard/orders';
            } catch (error) {
                console.error('Checkout error:', error);
                alert('Error: ' + error.message);
            } finally {
                this.checkingOut = false;
            }
        }
    }
}
</script>
@endpush
@endsection
