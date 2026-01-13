@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="text-4xl font-bold text-center mb-8 text-primary-dark font-serif">Your Cart</h1>
    
    <div class="max-w-4xl mx-auto" x-data="cartPage()" x-init="loadCart()">
        <div x-show="$store.cart.items.length === 0" class="text-center py-12">
            <div class="text-6xl mb-4">🛒</div>
            <p class="text-gray-600 text-lg mb-6">Your cart is empty</p>
            <a href="/menu" class="inline-block bg-primary text-white px-8 py-3 rounded-lg font-bold hover:bg-primary-dark transition-colors">
                Browse Menu
            </a>
        </div>
        
        <div x-show="$store.cart.items.length > 0" class="bg-white rounded-lg shadow-md p-8">
            <div class="space-y-4 mb-8">
                <template x-for="item in $store.cart.items" :key="item.id">
                    <div class="flex items-center gap-4 border-b pb-4">
                        <img :src="item.image || 'https://via.placeholder.com/200x200/f3f4f6/9ca3af?text=Food'" 
                             :alt="item.name" 
                             class="w-20 h-20 object-cover rounded"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/200x200/f3f4f6/9ca3af?text=Food';">
                        <div class="flex-1">
                            <h3 class="font-semibold text-primary-dark" x-text="item.name"></h3>
                            <p class="text-gray-500 text-sm mt-1">₱<span x-text="(item.price || 0).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></span> each</p>
                            <div class="flex items-center gap-2 mt-2">
                                <button 
                                    @click="if((item.quantity || 1) > 1) { $store.cart.updateQuantity(item.id, (item.quantity || 1) - 1); }"
                                    class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                    :disabled="(item.quantity || 1) <= 1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <span class="text-gray-700 font-medium w-8 text-center" x-text="item.quantity || 1"></span>
                                <button 
                                    @click="$store.cart.updateQuantity(item.id, (item.quantity || 1) + 1)"
                                    class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-primary" x-text="'₱' + (item.price * (item.quantity || 1)).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></p>
                            <button @click="$store.cart.remove(item.id)" class="text-red-500 text-sm hover:underline mt-1">
                                Remove
                            </button>
                        </div>
                    </div>
                </template>
            </div>
            
            <div class="border-t pt-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold">Total:</span>
                    <span class="text-2xl font-bold text-primary" x-text="'₱' + total.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></span>
                </div>
                
                @if(auth()->guard()->check())
                <button @click="showCheckout = true" class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary-dark transition-colors">
                    Proceed to Checkout
                </button>
                @else
                <a href="{{ route('login') }}" class="block w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary-dark transition-colors text-center">
                    Login to Checkout
                </a>
                @endif
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
             class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4"
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
                 class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8">
                
                <h2 class="text-2xl font-bold text-primary-dark mb-6">Checkout</h2>
                
                <form @submit.prevent="checkout()" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">GCash Number *</label>
                        <input type="text" 
                               x-model="checkoutForm.gcash_number"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               placeholder="09XX XXX XXXX">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Address (Optional)</label>
                        <textarea x-model="checkoutForm.delivery_address"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                  rows="3"
                                  placeholder="Enter your delivery address"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number (Optional)</label>
                        <input type="text" 
                               x-model="checkoutForm.customer_phone"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               placeholder="09XX XXX XXXX">
                    </div>
                    
                    <div class="flex gap-4 pt-4">
                        <button type="button" 
                                @click="showCheckout = false"
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" 
                                :disabled="checkingOut"
                                class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors disabled:opacity-50">
                            <span x-show="!checkingOut">Place Order</span>
                            <span x-show="checkingOut">Processing...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

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
            // Ensure cart is loaded from storage first
            try {
                if (window.Alpine && typeof window.Alpine.store === 'function') {
                    const cartStore = window.Alpine.store('cart');
                    if (cartStore) {
                        // Make sure cart is loaded from localStorage first
                        if (typeof cartStore.loadFromStorage === 'function') {
                            cartStore.loadFromStorage();
                        }
                        // Then try to sync with server (but don't overwrite if server is empty)
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
