<?php $__env->startSection('title', 'Build Your Bento Box - Washoku'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12" 
     x-data="bentoBuilder()"
     x-init="init()">
    
    <!-- Page Header -->
    <div class="container mx-auto px-4 mb-8">
        <div class="bg-gradient-to-br from-red-700 via-red-600 to-red-800 text-white py-8 px-8 rounded-3xl shadow-2xl text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
            </div>
            <div class="relative z-10">
                <h1 class="text-5xl md:text-6xl font-serif font-bold mb-3">Build Your Bento Box</h1>
                <p class="text-xl opacity-95">Customize your perfect Japanese meal</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Bento Box Builder -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Main Compartments (4 slots) -->
                <div class="bg-white p-8 rounded-3xl shadow-xl border-2 border-red-100">
                    <h2 class="text-3xl font-serif font-bold text-primary-dark mb-6 text-center">Your Bento Box</h2>
                    <div class="bg-gradient-to-br from-warm-cream to-warm-beige p-6 rounded-2xl">
                        <div class="grid grid-cols-2 gap-2" style="height: 500px; max-height: 500px; overflow: hidden;">
                            
                            <!-- Slot 1: Main Dish (Large) -->
                            <div class="row-span-2" style="height: 100%; overflow: hidden;">
                                <button 
                                    x-on:click="openModal('main', 0)"
                                    class="w-full h-full bg-white rounded-2xl border-4 transition-all hover:border-red-500 hover:shadow-2xl overflow-hidden relative group"
                                    style="height: 100%;"
                                    :class="bentoBox[0] ? 'border-red-600 shadow-lg' : 'border-gray-300 border-dashed'">
                                    
                                    <template x-if="bentoBox[0]">
                                        <div class="h-full flex flex-col relative" style="height: 100%; overflow: hidden;">
                                            <div class="flex-1 overflow-hidden">
                                                <img :src="bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food'" 
                                                     :alt="bentoBox[0]?.name || ''"
                                                     class="w-full h-full object-cover"
                                                     style="height: 100%; object-fit: cover;"
                                                     loading="lazy"
                                                     x-on:error="console.error('Image failed:', $event.target.src)"
                                                     onerror="console.error('Image error:', this.src); this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                                            </div>
                                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/60 to-transparent p-4">
                                                <p class="text-white font-bold text-lg mb-1" x-text="bentoBox[0].name"></p>
                                                <p class="text-white/90 text-sm">Main Dish</p>
                                            </div>
                                            <button 
                                                x-on:click.stop="removeItem(0)"
                                                class="absolute top-3 right-3 bg-red-600 hover:bg-red-700 text-white rounded-full p-2 shadow-lg transition-colors z-10">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                    
                                    <template x-if="!bentoBox[0]">
                                        <div class="h-full flex flex-col items-center justify-center p-6 text-center">
                                            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-red-200 transition-colors">
                                                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </div>
                                            <p class="font-bold text-primary-dark mb-1 text-lg">Main Dish</p>
                                            <p class="text-sm text-gray-600">Click to select</p>
                                        </div>
                                    </template>
                                </button>
                            </div>

                            <!-- Slot 2: Side 1 -->
                            <div style="height: calc((100% - 0.5rem) / 2); overflow: hidden;">
                                <button 
                                    x-on:click="openModal('side', 1)"
                                    class="w-full h-full bg-white rounded-2xl border-4 transition-all hover:border-red-500 hover:shadow-2xl overflow-hidden relative group"
                                    style="height: 100%;"
                                    :class="bentoBox[1] ? 'border-red-600 shadow-lg' : 'border-gray-300 border-dashed'">
                                    
                                    <template x-if="bentoBox[1]">
                                        <div class="h-full relative" style="height: 100%; overflow: hidden;">
                                            <img :src="bentoBox[1].image || 'https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food'" 
                                                 :alt="bentoBox[1].name"
                                                 class="w-full h-full object-cover"
                                                 style="height: 100%; object-fit: cover;"
                                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food';">
                                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                                <p class="text-white font-semibold text-sm" x-text="bentoBox[1].name"></p>
                                            </div>
                                            <button 
                                                x-on:click.stop="removeItem(1)"
                                                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full p-1.5 shadow-lg transition-colors z-10">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                    
                                    <template x-if="!bentoBox[1]">
                                        <div class="h-full flex flex-col items-center justify-center p-3 text-center">
                                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-red-200 transition-colors">
                                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </div>
                                            <p class="text-xs font-bold text-primary-dark">Side Dish</p>
                                        </div>
                                    </template>
                                </button>
                            </div>

                            <!-- Slot 3: Side 2 -->
                            <div style="height: calc((100% - 0.5rem) / 2); overflow: hidden;">
                                <button 
                                    x-on:click="openModal('side', 2)"
                                    class="w-full h-full bg-white rounded-2xl border-4 transition-all hover:border-red-500 hover:shadow-2xl overflow-hidden relative group"
                                    style="height: 100%;"
                                    :class="bentoBox[2] ? 'border-red-600 shadow-lg' : 'border-gray-300 border-dashed'">
                                    
                                    <template x-if="bentoBox[2]">
                                        <div class="h-full relative" style="height: 100%; overflow: hidden;">
                                            <img :src="bentoBox[2].image || 'https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food'" 
                                                 :alt="bentoBox[2].name"
                                                 class="w-full h-full object-cover"
                                                 style="height: 100%; object-fit: cover;"
                                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food';">
                                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                                <p class="text-white font-semibold text-sm" x-text="bentoBox[2].name"></p>
                                            </div>
                                            <button 
                                                x-on:click.stop="removeItem(2)"
                                                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full p-1.5 shadow-lg transition-colors z-10">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                    
                                    <template x-if="!bentoBox[2]">
                                        <div class="h-full flex flex-col items-center justify-center p-3 text-center">
                                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-red-200 transition-colors">
                                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </div>
                                            <p class="text-xs font-bold text-primary-dark">Side Dish</p>
                                        </div>
                                    </template>
                                </button>
                            </div>

                            <!-- Slot 4: Side 3 -->
                            <div class="col-span-2" style="height: calc((100% - 0.5rem) / 2); overflow: hidden;">
                                <button 
                                    x-on:click="openModal('side', 3)"
                                    class="w-full h-full bg-white rounded-2xl border-4 transition-all hover:border-red-500 hover:shadow-2xl overflow-hidden relative group"
                                    style="height: 100%;"
                                    :class="bentoBox[3] ? 'border-red-600 shadow-lg' : 'border-gray-300 border-dashed'">
                                    
                                    <template x-if="bentoBox[3]">
                                        <div class="h-full relative" style="height: 100%; overflow: hidden;">
                                            <img :src="bentoBox[3].image || 'https://via.placeholder.com/500x150/f3f4f6/9ca3af?text=Food'" 
                                                 :alt="bentoBox[3].name"
                                                 class="w-full h-full object-cover"
                                                 style="height: 100%; object-fit: cover;"
                                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/500x150/f3f4f6/9ca3af?text=Food';">
                                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                                <p class="text-white font-semibold" x-text="bentoBox[3].name"></p>
                                            </div>
                                            <button 
                                                x-on:click.stop="removeItem(3)"
                                                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full p-1.5 shadow-lg transition-colors z-10">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                    
                                    <template x-if="!bentoBox[3]">
                                        <div class="h-full flex items-center justify-center p-4 text-center">
                                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </div>
                                            <p class="text-sm font-bold text-primary-dark">Side Dish</p>
                                        </div>
                                    </template>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Right Column: Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-3xl shadow-xl border-2 border-red-100 sticky top-6">
                    <h3 class="text-2xl font-serif font-bold text-primary-dark mb-6">Your Order</h3>
                    
                    <!-- Progress Bar -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-semibold text-gray-700">Bento Progress</span>
                            <span class="text-sm font-bold text-red-600" x-text="filledSlots + '/4'"></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-red-500 to-red-600 h-full rounded-full transition-all duration-500" 
                                 :style="'width: ' + (filledSlots / 4 * 100) + '%'"></div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-gradient-to-br from-warm-cream to-warm-beige rounded-2xl p-4 mb-4 max-h-[400px] overflow-y-auto">
                        
                        <!-- Show message when empty -->
                        <template x-if="filledSlots === 0">
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                                <p class="text-primary-dark font-semibold mb-1">Start Building</p>
                                <p class="text-sm text-gray-600">Click any compartment to add items</p>
                            </div>
                        </template>

                        <!-- Bento Items -->
                        <div class="space-y-3">
                            <template x-for="(item, index) in bentoBox" :key="index">
                                <div x-show="item" class="flex items-start gap-3 pb-3 border-b border-red-200 last:border-0">
                                    <img :src="item?.image || 'https://via.placeholder.com/60x60/f3f4f6/9ca3af?text=Food'" 
                                         :alt="item?.name"
                                         class="w-14 h-14 object-cover rounded-lg border-2 border-red-200"
                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/60x60/f3f4f6/9ca3af?text=Food';">
                                    <div class="flex-1 min-w-0">
                                        <p class="font-bold text-primary-dark text-sm truncate" x-text="item?.name"></p>
                                        <p class="text-xs text-gray-600" x-text="index === 0 ? 'Main Dish' : 'Side Dish'"></p>
                                    </div>
                                    <button x-on:click="removeItem(index)" 
                                            class="text-red-600 hover:text-red-700 p-1 hover:bg-red-50 rounded transition-colors flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </template>

                        </div>
                    </div>

                    <!-- Price Breakdown -->
                    <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-4 mb-4 border-2 border-red-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-primary-dark font-semibold">Bento Box Base</span>
                            <span class="text-primary-dark font-bold">₱399</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="bg-gradient-to-br from-red-600 to-red-700 rounded-2xl p-4 mb-4 text-white">
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold">Total</span>
                            <span class="text-3xl font-bold" x-text="'₱' + calculateTotal()"></span>
                        </div>
                    </div>

                    <!-- Complete Order Button -->
                    <button 
                        x-on:click="completeOrder"
                        :disabled="filledSlots < 4"
                        :class="filledSlots < 4 ? 'opacity-50 cursor-not-allowed bg-gray-400' : 'hover:bg-red-700 hover:scale-105'"
                        class="w-full bg-red-600 text-white font-bold py-4 px-6 rounded-2xl transition-all shadow-lg transform">
                        <span x-show="filledSlots >= 4" class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Add to Cart
                        </span>
                        <span x-show="filledSlots < 4" class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Fill All Slots First
                        </span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Selection Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4"
         x-on:click.self="closeModal"
         x-on:keydown.escape.window="closeModal">
        
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90"
             class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[85vh] overflow-hidden border-4 border-red-200">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-br from-red-600 to-red-700 p-6 flex items-center justify-between text-white">
                <div>
                    <h3 class="text-3xl font-serif font-bold" x-text="modalTitle"></h3>
                    <p class="text-white/90 mt-1" x-text="modalSubtitle"></p>
                </div>
                <button x-on:click="closeModal" class="text-white hover:text-red-100 transition-colors p-2 hover:bg-white/20 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[calc(85vh-140px)]">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <template x-for="item in modalItems" :key="item.id">
                        <button 
                            type="button"
                            x-on:click.stop="selectItem(item)"
                            class="bg-white border-4 border-gray-300 rounded-2xl overflow-hidden transition-all hover:border-red-500 hover:shadow-xl group text-left cursor-pointer">
                            
                            <div class="aspect-square overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 relative">
                                <img :src="(item.image || item.image_url || 'https://placehold.co/400x400/f3f4f6/9ca3af?text=' + encodeURIComponent(item.name))" 
                                     :alt="item.name"
                                     x-on:error="$event.target.src='https://placehold.co/400x400/f3f4f6/9ca3af?text=' + encodeURIComponent(item.name)"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://placehold.co/400x400/f3f4f6/9ca3af?text=Food';">
                            </div>
                            
                            <div class="p-4">
                                <p class="font-bold text-primary-dark mb-2" x-text="item.name"></p>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2" x-text="item.description || 'Delicious Japanese dish'"></p>
                                <span class="inline-block bg-red-600 text-white font-bold px-4 py-2 rounded-full text-sm">
                                    Select
                                </span>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
function bentoBuilder() {
    return {
        bentoBox: [null, null, null, null],
        showModal: false,
        modalItems: [],
        modalType: '',
        currentSlot: null,
        modalTitle: '',
        modalSubtitle: '',
        
        mainDishes: <?php echo json_encode($mainDishes, 15, 512) ?>,
        sideDishes: <?php echo json_encode($sideDishes, 15, 512) ?>,
        
        init() {
            console.log('Bento Builder initialized');
            console.log('Main dishes:', this.mainDishes);
            if (this.mainDishes.length > 0) {
                console.log('First main dish:', this.mainDishes[0].name);
                console.log('First main dish image URL:', this.mainDishes[0].image);
                // Test if image loads
                const img = new Image();
                img.onload = () => console.log('✅ Image loaded successfully:', this.mainDishes[0].image);
                img.onerror = () => console.log('❌ Image failed to load:', this.mainDishes[0].image);
                img.src = this.mainDishes[0].image;
            }
        },
        
        get filledSlots() {
            return this.bentoBox.filter(item => item !== null).length;
        },
        
        openModal(type, slot) {
            this.modalType = type;
            this.currentSlot = slot;
            
            if (type === 'main') {
                this.modalItems = this.mainDishes;
                this.modalTitle = 'メインディッシュ';
                this.modalSubtitle = 'Choose Your Main Dish';
            } else {
                this.modalItems = this.sideDishes;
                this.modalTitle = '副菜';
                this.modalSubtitle = 'Choose Your Side Dish';
            }
            
            this.showModal = true;
        },
        
        closeModal() {
            this.showModal = false;
            setTimeout(() => {
                this.modalItems = [];
                this.modalType = '';
                this.currentSlot = null;
            }, 200);
        },
        
        selectItem(item) {
            console.log('=== SELECTING ITEM ===');
            console.log('Current slot:', this.currentSlot);
            console.log('Item:', item);
            
            if (this.currentSlot === null || this.currentSlot === undefined) {
                console.error('No slot selected!');
                return;
            }
            
            const imagePath = item.image || item.image_url || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';
            
            // Create a new object to ensure Alpine reactivity
            const newItem = {
                id: parseInt(item.id) || 0,
                name: item.name || 'Unknown',
                image: imagePath,
                image_url: imagePath,
                type: item.type || 'main'
            };
            
            // Use Alpine's reactivity by directly assigning
            this.bentoBox[this.currentSlot] = newItem;
            
            console.log('Item added to slot', this.currentSlot);
            console.log('Bento box now:', JSON.stringify(this.bentoBox, null, 2));
            
            // Force update
            this.$nextTick(() => {
                console.log('After update - Slot', this.currentSlot, ':', this.bentoBox[this.currentSlot]);
            });
            
            this.closeModal();
        },
        
        removeItem(slot) {
            console.log('Removing item from slot', slot);
            this.bentoBox[slot] = null;
            // Force Alpine update
            this.$nextTick(() => {
                console.log('Item removed from slot', slot);
            });
        },
        
        calculateTotal() {
            let total = 399; // Base bento price
            // Drinks are now free, so no additional charge
            return total.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0});
        },
        
        async completeOrder() {
            if (this.filledSlots < 4) {
                alert('Please fill all 4 bento compartments before adding to cart.');
                return;
            }
            
            // Create bento box item for cart
            const bentoName = 'Custom Bento Box';
            const bentoItems = this.bentoBox
                .filter(item => item !== null)
                .map(item => item.name)
                .join(', ');
            
            const fullName = `${bentoName} (${bentoItems}${this.selectedDrink ? ', ' + this.selectedDrink.name : ''})`;
            const totalPrice = 399; // Fixed price
            
            // Get a unique ID for this bento
            const bentoId = 'bento_' + Date.now();
            
            // Add to cart - wait for Alpine to be ready
            try {
                // Wait for Alpine to be available
                let cartStore = null;
                let attempts = 0;
                const maxAttempts = 20; // Increased attempts
                
                while (!cartStore && attempts < maxAttempts) {
                    // Try using the utility function if available
                    if (typeof window.getCartStore === 'function') {
                        cartStore = window.getCartStore();
                    } else if (window.Alpine && typeof window.Alpine.store === 'function') {
                        try {
                            cartStore = window.Alpine.store('cart');
                        } catch (e) {
                            // Store might not be registered yet
                        }
                    }
                    
                    if (!cartStore) {
                        await new Promise(resolve => setTimeout(resolve, 100));
                        attempts++;
                    }
                }
                
                if (cartStore && typeof cartStore.add === 'function') {
                    await cartStore.add({
                        id: bentoId,
                        name: fullName,
                        price: totalPrice,
                        image: this.bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Bento',
                        quantity: 1
                    });
                    
                    // Reset builder
                    this.bentoBox = [null, null, null, null];
                    
                    // Show success message
                    alert('Bento box added to cart!');
                } else {
                    // Fallback: save to localStorage directly
                    const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
                    const userId = document.querySelector('meta[name="user-id"]')?.content;
                    const cartKey = authCheck === 'true' && userId ? `cart_user_${userId}` : 'cart_guest';
                    
                    const existingCart = JSON.parse(localStorage.getItem(cartKey) || '{"items":[],"count":0}');
                    existingCart.items.push({
                        id: bentoId,
                        name: fullName,
                        price: totalPrice,
                        image: this.bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Bento',
                        quantity: 1
                    });
                    existingCart.count = existingCart.items.reduce((sum, item) => sum + (item.quantity || 1), 0);
                    localStorage.setItem(cartKey, JSON.stringify(existingCart));
                    
                    // Reset builder
                    this.bentoBox = [null, null, null, null];
                    
                    // Dispatch event to update cart
                    window.dispatchEvent(new CustomEvent('cart-updated'));
                    
                    alert('Bento box added to cart!');
                }
            } catch (error) {
                console.error('Error adding to cart:', error);
                alert('There was an error adding the item to cart. Please try again.');
            }
        }
    }
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/bento-builder/index.blade.php ENDPATH**/ ?>