<?php $__env->startSection('title', $category->name . ' - Washoku'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] relative overflow-hidden"
     x-data="menuItemsPage()"
     x-init="init()">
    
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-100/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-amber-100/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <!-- Hero Header Section -->
    <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-12 overflow-hidden">
        <!-- Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
        
        <!-- Decorative Glows -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
        
        <!-- Gold Accent Lines -->
        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm text-white/60 mb-6">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-amber-400 transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="<?php echo e(route('menu.index')); ?>" class="hover:text-amber-400 transition-colors">Menu</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-amber-400 font-medium"><?php echo e($category->name); ?></span>
            </nav>
            
            <!-- Category Header -->
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 font-serif"><?php echo e($category->name); ?></h1>
                <?php if($category->description): ?>
                    <p class="text-white/60 text-lg max-w-2xl mx-auto"><?php echo e($category->description); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <!-- Category Tabs -->
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
            <!-- Filter Tabs -->
            <div class="mb-10">
                <div class="flex flex-wrap justify-center gap-3">
                    <button 
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' 
                            ? 'bg-gradient-to-r from-[#1a1a1a] to-[#2d1f1f] text-white shadow-xl border-amber-400/50' 
                            : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2">
                        All Items
                    </button>
                    <button 
                        @click="activeTab = 'featured'"
                        :class="activeTab === 'featured' 
                            ? 'bg-gradient-to-r from-[#1a1a1a] to-[#2d1f1f] text-white shadow-xl border-amber-400/50' 
                            : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Featured
                    </button>
                    <button 
                        @click="activeTab = 'traditional'"
                        :class="activeTab === 'traditional' 
                            ? 'bg-gradient-to-r from-[#1a1a1a] to-[#2d1f1f] text-white shadow-xl border-amber-400/50' 
                            : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2">
                        Traditional
                    </button>
                    <button 
                        @click="activeTab = 'character'"
                        :class="activeTab === 'character' 
                            ? 'bg-gradient-to-r from-[#1a1a1a] to-[#2d1f1f] text-white shadow-xl border-amber-400/50' 
                            : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2">
                        Character/Decorative
                    </button>
                </div>
            </div>

            <!-- Menu Items Grid -->
            <?php if($items->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div 
                        x-show="filterItems(<?php echo \Illuminate\Support\Js::from([
                            'name' => $item->name,
                            'is_featured' => $item->is_featured ?? false
                        ])->toHtml() ?>)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        @click="openItemModal(<?php echo \Illuminate\Support\Js::from([
                            'id' => $item->id,
                            'name' => $item->name,
                            'description' => $item->description,
                            'price' => $item->price,
                            'image' => $item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food',
                            'is_featured' => $item->is_featured ?? false,
                            'is_bestseller' => $item->is_bestseller ?? false,
                            'is_custom_bento' => $item->name === 'Custom Bento Box (4 compartments)'
                        ])->toHtml() ?>)"
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 cursor-pointer transform hover:-translate-y-2 border border-gray-100 hover:border-red-200">
                        
                        <!-- Image Section -->
                        <div class="relative overflow-hidden h-56">
                            <img 
                                src="<?php echo e($item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food'); ?>" 
                                alt="<?php echo e($item->name); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                            
                            <!-- Badges -->
                            <?php if($item->is_featured): ?>
                                <div class="absolute top-3 left-3 bg-gradient-to-r from-amber-400 to-amber-500 text-black px-3 py-1.5 rounded-full text-xs font-bold shadow-lg flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    Featured
                                </div>
                            <?php endif; ?>
                            <?php if($item->is_bestseller): ?>
                                <div class="absolute top-3 right-3 bg-gradient-to-r from-red-600 to-red-700 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                                    Bestseller
                                </div>
                            <?php endif; ?>
                            
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                                <span class="text-white font-semibold px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">
                                    View Details
                                </span>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-800 group-hover:text-red-600 mb-2 transition-colors line-clamp-1"><?php echo e($item->name); ?></h3>
                            <?php if($item->description): ?>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2"><?php echo e(\Illuminate\Support\Str::limit($item->description, 60)); ?></p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-red-600">₱<?php echo e(number_format($item->price, 0)); ?></span>
                                <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No items available</h2>
                    <p class="text-gray-500 mb-6">This category doesn't have any menu items yet.</p>
                    <a href="<?php echo e(route('menu.index')); ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-3 rounded-full font-semibold hover:from-red-500 hover:to-red-600 transition-all shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Browse Other Categories
                    </a>
                </div>
            <?php endif; ?>
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
         class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
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
                <div class="h-64 md:h-72 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                    <img :src="selectedItem?.image || 'https://via.placeholder.com/600x400/f3f4f6/9ca3af?text=Food'" 
                         :alt="selectedItem?.name"
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400/f3f4f6/9ca3af?text=Food';">
                </div>
                
                <!-- Close Button -->
                <button x-on:click="closeModal()" 
                        class="absolute top-4 right-4 bg-white/90 hover:bg-white text-gray-700 hover:text-red-600 w-10 h-10 rounded-full flex items-center justify-center transition-all shadow-lg hover:shadow-xl hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex gap-2">
                    <template x-if="selectedItem?.is_featured">
                        <span class="bg-gradient-to-r from-amber-400 to-amber-500 text-black px-3 py-1.5 rounded-full text-sm font-bold shadow-lg flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Featured
                        </span>
                    </template>
                    <template x-if="selectedItem?.is_bestseller">
                        <span class="bg-gradient-to-r from-red-600 to-red-700 text-white px-3 py-1.5 rounded-full text-sm font-bold shadow-lg">
                            Bestseller
                        </span>
                    </template>
                </div>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6 md:p-8 overflow-y-auto max-h-[calc(90vh-320px)]">
                <!-- Item Name -->
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4" x-text="selectedItem?.name"></h2>
                
                <!-- Price -->
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl font-bold text-red-600" x-text="'₱' + (selectedItem?.price ? Number(selectedItem.price).toFixed(0) : '0')"></span>
                    <span class="text-gray-400 text-sm bg-gray-100 px-3 py-1 rounded-full">per serving</span>
                </div>
                
                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Description</h3>
                    <p class="text-gray-600 leading-relaxed" x-text="selectedItem?.description || 'A delicious Japanese dish prepared with the finest ingredients and traditional cooking methods.'"></p>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <template x-if="selectedItem?.is_custom_bento">
                        <a href="/bento-builder"
                           class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-4 rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            Customize Your Bento
                        </a>
                    </template>
                    <template x-if="!selectedItem?.is_custom_bento">
                        <button 
                            @click="addToCartFromModal()"
                            class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-4 rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Add to Cart
                        </button>
                    </template>
                    <button 
                        @click="closeModal()"
                        class="sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
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
            this.selectedItem = item;
            this.showModal = true;
            document.body.style.overflow = 'hidden';
        },
        
        closeModal() {
            this.showModal = false;
            document.body.style.overflow = '';
            setTimeout(() => {
                this.selectedItem = null;
            }, 300);
        },
        
        addToCartFromModal() {
            if (!this.selectedItem) return;
            
            const item = this.selectedItem;
            
            if (window.Alpine && window.Alpine.store('cart')) {
                window.Alpine.store('cart').addToCart(
                    item.id,
                    item.name,
                    item.price,
                    item.image
                );
            } else {
                const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
                const userId = document.querySelector('meta[name="user-id"]')?.content;
                const cartKey = authCheck === 'true' && userId ? `cart_user_${userId}` : 'cart_guest';
                
                const existingCart = JSON.parse(localStorage.getItem(cartKey) || '{"items":[],"count":0}');
                
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
                
                window.dispatchEvent(new CustomEvent('cart-updated'));
            }
            
            this.closeModal();
            alert('Added to cart: ' + item.name);
        }
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/menu/category.blade.php ENDPATH**/ ?>