<?php $__env->startSection('title', 'Build Your Bento Box - Washoku'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] relative overflow-hidden" 
     x-data="bentoBuilder()"
     x-init="init()">
    
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-100/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-amber-100/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <!-- Page Header - Dark Theme -->
    <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-12 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3">Customize Your Meal</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif">
                Build Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Bento</span>
            </h1>
            <p class="text-white/60 text-lg">Select 1 main dish and 3 sides to complete your box</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 relative z-10">
        <div class="grid lg:grid-cols-3 gap-6">
            
            <!-- Left Column: Bento Box Builder -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Your Bento Box</h2>
                    </div>
                    
                    <div class="p-4">
                        <!-- Compact Bento Grid using Flexbox -->
                        <div class="flex flex-col gap-1.5">
                            <!-- Top Row: Main + 2 Sides -->
                            <div class="flex gap-1.5 h-[320px]">
                                <!-- Slot 1: Main Dish (Large) -->
                                <div class="w-1/2 h-full overflow-hidden">
                                    <button 
                                        x-on:click="openModal('main', 0)"
                                        class="w-full h-full rounded-xl border-2 transition-all hover:border-red-500 hover:shadow-lg overflow-hidden relative group"
                                        :class="bentoBox[0] ? 'border-red-500 shadow-md' : 'border-dashed border-gray-300 bg-gray-50'">
                                        
                                        <template x-if="bentoBox[0]">
                                            <div class="absolute inset-0">
                                                <img :src="bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food'" 
                                                     :alt="bentoBox[0]?.name || ''"
                                                     class="w-full h-full object-cover"
                                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent p-3">
                                                    <p class="text-white font-bold text-base" x-text="bentoBox[0].name"></p>
                                                    <p class="text-white/80 text-xs">Main Dish</p>
                                                </div>
                                                <button 
                                                    x-on:click.stop="removeItem(0)"
                                                    class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full w-7 h-7 flex items-center justify-center shadow-lg transition-colors z-10">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                        
                                        <template x-if="!bentoBox[0]">
                                            <div class="h-full flex flex-col items-center justify-center p-4">
                                                <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center mb-3 group-hover:bg-red-200 transition-colors">
                                                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                    </svg>
                                                </div>
                                                <p class="font-bold text-gray-700 text-sm">Main Dish</p>
                                                <p class="text-xs text-gray-500">Click to select</p>
                                            </div>
                                        </template>
                                    </button>
                                </div>

                                <!-- Right Column: 2 Side Dishes Stacked -->
                                <div class="w-1/2 h-full flex flex-col gap-1.5">
                                    <!-- Slot 2: Side 1 -->
                                    <div class="h-1/2 overflow-hidden">
                                        <button 
                                            x-on:click="openModal('side', 1)"
                                            class="w-full h-full rounded-xl border-2 transition-all hover:border-red-500 hover:shadow-lg overflow-hidden relative group"
                                            :class="bentoBox[1] ? 'border-red-500 shadow-md' : 'border-dashed border-gray-300 bg-gray-50'">
                                            
                                            <template x-if="bentoBox[1]">
                                                <div class="absolute inset-0">
                                                    <img :src="bentoBox[1].image || 'https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food'" 
                                                         :alt="bentoBox[1].name"
                                                         class="w-full h-full object-cover"
                                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food';">
                                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-2">
                                                        <p class="text-white font-semibold text-xs truncate" x-text="bentoBox[1].name"></p>
                                                    </div>
                                                    <button 
                                                        x-on:click.stop="removeItem(1)"
                                                        class="absolute top-1.5 right-1.5 bg-red-600 hover:bg-red-700 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg transition-colors z-10">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="!bentoBox[1]">
                                                <div class="h-full flex flex-col items-center justify-center p-2">
                                                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-red-200 transition-colors">
                                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </div>
                                                    <p class="text-xs font-semibold text-gray-600">Side Dish</p>
                                                </div>
                                            </template>
                                        </button>
                                    </div>

                                    <!-- Slot 3: Side 2 -->
                                    <div class="h-1/2 overflow-hidden">
                                        <button 
                                            x-on:click="openModal('side', 2)"
                                            class="w-full h-full rounded-xl border-2 transition-all hover:border-red-500 hover:shadow-lg overflow-hidden relative group"
                                            :class="bentoBox[2] ? 'border-red-500 shadow-md' : 'border-dashed border-gray-300 bg-gray-50'">
                                            
                                            <template x-if="bentoBox[2]">
                                                <div class="absolute inset-0">
                                                    <img :src="bentoBox[2].image || 'https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food'" 
                                                         :alt="bentoBox[2].name"
                                                         class="w-full h-full object-cover"
                                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food';">
                                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-2">
                                                        <p class="text-white font-semibold text-xs truncate" x-text="bentoBox[2].name"></p>
                                                    </div>
                                                    <button 
                                                        x-on:click.stop="removeItem(2)"
                                                        class="absolute top-1.5 right-1.5 bg-red-600 hover:bg-red-700 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg transition-colors z-10">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="!bentoBox[2]">
                                                <div class="h-full flex flex-col items-center justify-center p-2">
                                                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-red-200 transition-colors">
                                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </div>
                                                    <p class="text-xs font-semibold text-gray-600">Side Dish</p>
                                                </div>
                                            </template>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Row: Wide Side Dish -->
                            <div class="h-[90px] overflow-hidden">
                                <button 
                                    x-on:click="openModal('side', 3)"
                                    class="w-full h-full rounded-xl border-2 transition-all hover:border-red-500 hover:shadow-lg overflow-hidden relative group"
                                    :class="bentoBox[3] ? 'border-red-500 shadow-md' : 'border-dashed border-gray-300 bg-gray-50'">
                                    
                                    <template x-if="bentoBox[3]">
                                        <div class="absolute inset-0">
                                            <img :src="bentoBox[3].image || 'https://via.placeholder.com/500x150/f3f4f6/9ca3af?text=Food'" 
                                                 :alt="bentoBox[3].name"
                                                 class="w-full h-full object-cover"
                                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/500x150/f3f4f6/9ca3af?text=Food';">
                                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-2">
                                                <p class="text-white font-semibold text-sm" x-text="bentoBox[3].name"></p>
                                            </div>
                                            <button 
                                                x-on:click.stop="removeItem(3)"
                                                class="absolute top-1.5 right-1.5 bg-red-600 hover:bg-red-700 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg transition-colors z-10">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                    
                                    <template x-if="!bentoBox[3]">
                                        <div class="h-full flex items-center justify-center gap-3 p-3">
                                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-200 transition-colors">
                                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </div>
                                            <p class="text-sm font-semibold text-gray-600">Side Dish</p>
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
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden sticky top-24">
                    <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800">Your Order</h3>
                    </div>
                    
                    <div class="p-5">
                        <!-- Progress Bar -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-600">Bento Progress</span>
                                <span class="text-sm font-bold text-red-600" x-text="filledSlots + '/4'"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                <div class="bg-gradient-to-r from-red-500 to-red-600 h-full rounded-full transition-all duration-500" 
                                     :style="'width: ' + (filledSlots / 4 * 100) + '%'"></div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="bg-gray-50 rounded-xl p-3 mb-4 min-h-[120px]">
                            <template x-if="filledSlots === 0">
                                <div class="text-center py-6">
                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 font-medium text-sm">Start Building</p>
                                    <p class="text-xs text-gray-500">Click any compartment</p>
                                </div>
                            </template>

                            <div class="space-y-2">
                                <template x-for="(item, index) in bentoBox" :key="index">
                                    <div x-show="item" class="flex items-center gap-2 p-2 bg-white rounded-lg border border-gray-100">
                                        <img :src="item?.image || 'https://via.placeholder.com/40x40/f3f4f6/9ca3af?text=Food'" 
                                             :alt="item?.name"
                                             class="w-10 h-10 object-cover rounded-lg"
                                             onerror="this.onerror=null; this.src='https://via.placeholder.com/40x40/f3f4f6/9ca3af?text=Food';">
                                        <div class="flex-1 min-w-0">
                                            <p class="font-medium text-gray-800 text-xs truncate" x-text="item?.name"></p>
                                            <p class="text-[10px] text-gray-500" x-text="index === 0 ? 'Main' : 'Side'"></p>
                                        </div>
                                        <button x-on:click="removeItem(index)" class="text-gray-400 hover:text-red-600 p-1 transition-colors flex-shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl mb-3">
                            <span class="text-gray-600 font-medium text-sm">Bento Box Base</span>
                            <span class="text-gray-800 font-bold">₱399</span>
                        </div>

                        <!-- Total -->
                        <div class="bg-gradient-to-r from-[#1a1a1a] to-[#2d1f1f] rounded-xl p-4 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-white font-bold">Total</span>
                                <span class="text-2xl font-bold text-amber-400" x-text="'₱' + calculateTotal()"></span>
                            </div>
                        </div>

                        <!-- Complete Order Button -->
                        <button 
                            x-on:click="completeOrder"
                            :disabled="filledSlots < 4"
                            :class="filledSlots < 4 ? 'opacity-50 cursor-not-allowed bg-gray-400' : 'bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 hover:scale-[1.02]'"
                            class="w-full text-white font-bold py-3.5 px-6 rounded-xl transition-all shadow-lg">
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
    </div>

    <!-- Selection Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
         x-on:click.self="closeModal"
         x-on:keydown.escape.window="closeModal">
        
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90"
             class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[85vh] overflow-hidden">
            
            <!-- Modal Header - Dark Theme -->
            <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] p-6 overflow-hidden">
                <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-amber-400/80 text-xs font-medium tracking-widest uppercase mb-1" x-text="modalTitle"></p>
                        <h3 class="text-2xl font-bold text-white" x-text="modalSubtitle"></h3>
                    </div>
                    <button x-on:click="closeModal" class="text-white/70 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[calc(85vh-120px)] bg-gradient-to-br from-[#f8f5f0] to-[#f5f1e8]">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <template x-for="item in modalItems" :key="item.id">
                        <button 
                            type="button"
                            x-on:click.stop="selectItem(item)"
                            class="bg-white border-2 border-gray-200 rounded-xl overflow-hidden transition-all hover:border-red-500 hover:shadow-xl group text-left cursor-pointer">
                            
                            <div class="aspect-square overflow-hidden bg-gray-100 relative">
                                <img :src="(item.image || item.image_url || 'https://placehold.co/400x400/f3f4f6/9ca3af?text=' + encodeURIComponent(item.name))" 
                                     :alt="item.name"
                                     x-on:error="$event.target.src='https://placehold.co/400x400/f3f4f6/9ca3af?text=' + encodeURIComponent(item.name)"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://placehold.co/400x400/f3f4f6/9ca3af?text=Food';">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                            </div>
                            
                            <div class="p-3">
                                <p class="font-bold text-gray-800 text-sm mb-1 line-clamp-1" x-text="item.name"></p>
                                <p class="text-xs text-gray-500 mb-2 line-clamp-1" x-text="item.description || 'Delicious Japanese dish'"></p>
                                <span class="inline-block bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold px-3 py-1.5 rounded-full text-xs">
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
            if (this.currentSlot === null || this.currentSlot === undefined) {
                return;
            }
            
            const imagePath = item.image || item.image_url || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';
            
            const newItem = {
                id: parseInt(item.id) || 0,
                name: item.name || 'Unknown',
                image: imagePath,
                image_url: imagePath,
                type: item.type || 'main'
            };
            
            this.bentoBox[this.currentSlot] = newItem;
            this.closeModal();
        },
        
        removeItem(slot) {
            this.bentoBox[slot] = null;
        },
        
        calculateTotal() {
            return '399';
        },
        
        async completeOrder() {
            if (this.filledSlots < 4) {
                alert('Please fill all 4 bento compartments before adding to cart.');
                return;
            }
            
            const bentoName = 'Custom Bento Box';
            const bentoItems = this.bentoBox.filter(item => item !== null).map(item => item.name).join(', ');
            const fullName = `${bentoName} (${bentoItems})`;
            const totalPrice = 399;
            const bentoId = 'bento_' + Date.now();
            
            try {
                let cartStore = null;
                let attempts = 0;
                const maxAttempts = 20;
                
                while (!cartStore && attempts < maxAttempts) {
                    if (typeof window.getCartStore === 'function') {
                        cartStore = window.getCartStore();
                    } else if (window.Alpine && typeof window.Alpine.store === 'function') {
                        try { cartStore = window.Alpine.store('cart'); } catch (e) {}
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
                    this.bentoBox = [null, null, null, null];
                    alert('Bento box added to cart!');
                } else {
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
                    this.bentoBox = [null, null, null, null];
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