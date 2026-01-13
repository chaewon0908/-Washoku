import './bootstrap';
import Alpine from 'alpinejs';

// Initialize Alpine.js
window.Alpine = Alpine;

// Cart Store - Register before starting Alpine
document.addEventListener('alpine:init', () => {
    Alpine.store('cart', {
        items: [],
        count: 0,

        init() {
            this.loadFromStorage();
        },

        loadFromStorage() {
            const storageKey = this.getStorageKey();
            const stored = localStorage.getItem(storageKey);
            if (stored) {
                try {
                    const data = JSON.parse(stored);
                    this.items = data.items || [];
                    this.count = this.items.reduce((sum, item) => sum + (item.quantity || 1), 0);
                } catch (e) {
                    console.error('Error loading cart from storage:', e);
                    this.items = [];
                    this.count = 0;
                }
            }
        },

        getStorageKey() {
            const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
            if (authCheck === 'true') {
                const userId = document.querySelector('meta[name="user-id"]')?.content;
                return userId ? `cart_user_${userId}` : 'cart_guest';
            }
            return 'cart_guest';
        },

        async loadFromServer() {
            // If authenticated, try to load from server
            const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
            if (authCheck === 'true') {
                try {
                    const response = await fetch('/api/cart', {
                        credentials: 'same-origin',
                        headers: {
                            'Accept': 'application/json',
                        }
                    });
                    if (response.ok) {
                        const data = await response.json();
                        // Merge server items with local items (prefer local if both exist)
                        // Only use server items if local storage is empty
                        const localItems = this.items.length > 0 ? this.items : [];
                        const serverItems = data.items || [];
                        
                        if (serverItems.length > 0 && localItems.length === 0) {
                            // Only use server items if local is empty
                            this.items = serverItems;
                            this.count = this.items.reduce((sum, item) => sum + (item.quantity || 1), 0);
                            this.save();
                        } else if (localItems.length > 0) {
                            // Keep local items and sync to server
                            this.save();
                        }
                    }
                } catch (e) {
                    console.error('Error loading cart from server:', e);
                    // On error, keep local storage items
                }
            }
        },

        async add(item) {
            const existingItem = this.items.find(i => i.id === item.id);
            if (existingItem) {
                existingItem.quantity = (existingItem.quantity || 1) + 1;
            } else {
                this.items.push({
                    ...item,
                    quantity: item.quantity || 1
                });
            }
            this.updateCount();
            await this.save();
            this.dispatchUpdate();
        },

        addToCart(id, name, price, image) {
            this.add({
                id: id,
                name: name,
                price: price,
                image: image || 'https://via.placeholder.com/200x200/f3f4f6/9ca3af?text=Food'
            });
        },

        remove(id) {
            this.items = this.items.filter(item => item.id !== id);
            this.updateCount();
            this.save();
            this.dispatchUpdate();
        },

        updateQuantity(id, quantity) {
            const item = this.items.find(i => i.id === id);
            if (item) {
                item.quantity = Math.max(1, quantity);
                this.updateCount();
                this.save();
                this.dispatchUpdate();
            }
        },

        clear() {
            this.items = [];
            this.count = 0;
            this.save();
            this.dispatchUpdate();
        },

        updateCount() {
            this.count = this.items.reduce((sum, item) => sum + (item.quantity || 1), 0);
        },

        async save() {
            const storageKey = this.getStorageKey();
            localStorage.setItem(storageKey, JSON.stringify({
                items: this.items,
                count: this.count
            }));

            // If authenticated, save to server
            const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
            if (authCheck === 'true') {
                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
                    await fetch('/api/cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({ items: this.items })
                    });
                } catch (e) {
                    console.error('Error saving cart to server:', e);
                }
            }
        },

        dispatchUpdate() {
            window.dispatchEvent(new CustomEvent('cart-updated'));
        }
    });
});

// Start Alpine after cart store is registered
Alpine.start();

// Utility function to safely get cart store
window.getCartStore = function() {
    try {
        if (window.Alpine && typeof window.Alpine.store === 'function') {
            return window.Alpine.store('cart');
        }
    } catch (e) {
        console.error('Error accessing cart store:', e);
    }
    return null;
};
